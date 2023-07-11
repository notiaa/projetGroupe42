<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Regime_model extends CI_Model{
        public function getDetail($idRegime, $duree){
            $sql = "SELECT c.nom, c.description, dr.quantite, u.value, '" . $duree . "' as duree,image, '" . $idRegime . "' as idRegime from detail_regime as dr JOIN composant as c ON dr.idcomposant=c.idcomposant JOIN unite as u ON c.idUnite=u.idUnite WHERE dr.idregime=%s";
            $sql = sprintf($sql, $idRegime);
            $rows = $this->db->query($sql);
            return $rows->result_array();
        }

        public function getRegimeFit($gain, $height, $weight, $gender,$objectif){
            $ans = array();
            if($gain){
                $sql = "SELECT * FROM regime WHERE coefficient > 0";
                $result = $this->db->query($sql);
                foreach ($result->result_array() as $row) {
                    if ($gender==1) {
                        $duree = round($objectif/((($height - 120)/ $weight) * $row['coefficient']));
                    }
                    else $duree = round($objectif/((($height - 100)/ $weight) * $row['coefficient']));
                    $values = array(
                        'idRegime' => $row['idRegime'], 
                        'duree' => $duree,
                        'prix' => $row['prix'] * $duree,
                        'gender' => $gender
                        );
                    array_push($ans, $values);
                }
            }
            else{
                $sql = "SELECT * FROM regime WHERE coefficient < 0";
                $result = $this->db->query($sql);
                foreach ($result->result_array() as $row) {
                    if ($gender==1) {
                        $duree = round($objectif/((($height - 80)/ $weight) * $row['coefficient']));
                    }
                    $duree = round(10/((($height - 100)/ $weight) * -$row['coefficient']));
                    $values = array(
                        'idRegime' => $row['idRegime'], 
                        'duree' => $duree,
                        'prix' => $row['prix'] * $duree,
                        'gender' => $gender
                        );
                    array_push($ans, $values);
                }
            }
            return $ans;
            // $coef = ($height - 100)/$weight;
            // return 10 / ($coef * 1);    
        }

        public function getComposant(){
            $sql = "SELECT * FROM composant";
            $result = $this->db->query($sql);
            return $result->result_array();
        }
    }
?>