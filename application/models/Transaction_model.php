<?php
    defined('BASEPATH') OR exit('No direct script access allowed');date_default_timezone_set("europe/paris");
    class Transaction_model extends CI_Model{
        public function payer($idAccount, $montant){
            try {
                $this->updateAccount($idAccount, -$montant);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $this->insertTransac($idAccount, 1, $montant);
        }

        public function payerDater($idAccount, $montant, $date){
            try {
                $this->updateAccount($idAccount, -$montant);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            $this->insertTransacDater($idAccount, 1, $montant, $date);
        }

        public function getAccountValue($idAccount){
            $sql = "SELECT montant FROM account WHERE idAccount=" . $idAccount;
            $result = $this->db->query($sql);
            $ans = $result->result_array();
            return $ans[0]['montant'];
        }

        public function updateAccount($idAccount, $value)
        {
            $current_value = $this->getAccountValue($idAccount);
            if ($value < 0 && $current_value < -$value) {
                throw new Exception("Transaction invalide, balance insuffisante");
            }
            $sql = "UPDATE account set montant=%s WHERE idAccount=%s";
            $sql = sprintf($sql, $current_value + $value, $idAccount);
            $this->db->query($sql);
        }

        public function insertTransac($idAccount, $mouvement, $montant){
            $sql = "INSERT INTO transaction VALUES(%s, %s, %s, current_date())";
            $sql = sprintf($sql, $idAccount,$mouvement ,$montant);
            echo $sql;
            $this->db->query($sql);
        }

        public function insertTransacDater($idAccount, $mouvement, $montant, $date){
            $sql = "INSERT INTO transaction VALUES(%s, %s, %s, %s)";
            $sql = sprintf($sql, $idAccount,$mouvement,$montant,$this->db->escape($date));
            $this->db->query($sql);
        }

        public function generateCode($montant){
            $sql = "INSERT INTO code_credit VALUES(null, (SELECT key_value FROM key_char), 0, %s)";
            $sql = sprintf($sql, $montant);
            $this->db->query($sql);
        }

        public function getValidCode(){
            $sql = "SELECT * FROM code_credit WHERE used=0";
            $result = $this->db->query($sql);
            $ans = array();
            foreach ($result->result_array() as $row) {
                array_push($ans, $row);
            }
            return $ans;
        }

        public function getInvalidCode(){
            $sql = "SELECT * FROM code_credit WHERE used=1";
            $result = $this->db->query($sql);
            $ans = array();
            foreach ($result->result_array() as $row) {
                array_push($ans, $row);
            }
            return $ans;
        }

        public function getCode($row){
            $completing = strlen($row['numeric_value']);
            $zeros = "";
            for ($i=$completing; $i < 7; $i++) { 
                $zeros = $zeros . '0';
            }
            return $row['key_char'] . $zeros . $row['numeric_value'];
        }

        public function valider($idAccount, $code){
            $codes = $this->getValidCode();
            foreach ($codes as $row) {
                if ($code == $this->getCode($row)) {
                    $this->db->query("DELETE FROM credit_attente WHERE code=" . $this->db->escape($code));
                    $this->insertCredit($idAccount, $row['value'], $code);
                    $this->db->query("UPDATE code_credit SET used=1 WHERE numeric_value=" . $row['numeric_value']);
                    return 0;
                }
            }
            $this->db->query("DELETE FROM credit_attente WHERE code=" . $this->db->escape($code));
            return 1;
        }

        public function insertCredit($idAccount, $montant, $code){
            $sql = "INSERT INTO credit VALUES(%s, %s, %s)";
            $sql = sprintf($sql, $idAccount, $montant, $this->db->escape($code));
            $this->db->query($sql);
            $this->insertTransac($idAccount, 0, $montant);
            $this->updateAccount($idAccount, $montant);
        }

        public function demandeCredit($idAccount, $code){
            if(strlen($code) != 10){
                return "format de code non valide";
            }
            $sql = "INSERT INTO credit_attente VALUES(%s, %s)";
            $sql = sprintf($sql, $idAccount, $this->db->escape($code));
            try{
                $val = $this->db->query($sql);
            }catch (SQLException $e){
                return $e->getMessage();
            }
            return "Demande envoyée";
        }
        public function getlisteattente(){
            $sql = "select cr.idAccount,u.nom as nom,code from credit_attente as cr join account as a on cr.idAccount=a.idaccount
            join user as u on a.idUser=u.idUser;";
           
            $result = $this->db->query($sql);
            $ans = $result->result_array();
          return $ans;
        }
        public function switchToGold($idUser){
            $this->load->model('User_model');
            $idAccount = $this->User_model->getAccount($idUser);
            $this->updateAccount($idAccount, -30000);
            $this->insertTransac($idAccount, 1, 30000);
            $sql = "UPDATE user set isGold=1 WHERE idUser=" . $idUser;
            $this->db->query($sql);
        }

        public function Achat($idUser, $idRegime, $isGold){
            $this->load->model('Regime_model');
            $this->load->model('User_model');
            $prix = $this->Regime_model->getPrix($idRegime);
            if ($isGold == 1) {
                $prix = $prix - $prix * 0.15;
            }
            $idAccount = $this->User_model->getAccount($idUser);
            $this->payer($idAccount, $prix);
            $sql = "INSERT INTO achat VALUES(%s, %s, %s, current_date())";
            $sql = sprintf($sql, $idUser, $idRegime, $prix);
            $this->db->query($sql);
        }
    }
?>