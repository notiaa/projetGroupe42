<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model{
        public function insert_detail($idUser, $sexe, $taille, $poids){
            $sql = "INSERT INTO detail_user VALUES(%s, %s, %s, %s)";
            $sql = sprintf($sql, $idUser, $this->db->escape($sexe), $this->db->escape($taille), $this->db->escape($poids));
            echo $sql;
        }

        public function getImg($idUser){
            $sql = "SELECT img FROM user WHERE idUser=" . $idUser;
        }

        public function getAccount($idUser){
            $sql = "SELECT idAccount FROM account WHERE idUser = " . $idUser;
            $result = $this->db->query($sql);
            $ans = $result->result_array();
            return $ans[0]['idAccount'];
        }

        public function getUserInfo($idUser){
            $sql = "SELECT nom,email FROM user WHERE idUser=" . $idUser;
            $result = $this->db->query($sql);
            $ans = $result->result_array();
            return $ans[0];
        }
    }
?>