<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Regime_model extends CI_Model{
        public function getDetail($idRegime){
            $sql = "SELECT dr.idRegime, c.nom, c.description, dr.quantite, u.value, '1 jour' as duree from detail_regime as dr JOIN composant as c ON dr.idcomposant=c.idcomposant JOIN unite as u ON c.idUnite=u.idUnite WHERE dr.idregime=%s";
            $sql = sprintf($sql, $idRegime);
            //$rows = $this->db->query($sql);
            //return $rows->result_array();
            echo $sql;
        }

        public function getRegimeFit($gain, $height, $weight){
            $ans = array();
            if($gain){
                $sql = "SELECT * FROM regime WHERE coefficient > 0";
                $result = $this->db->query($sql);
                foreach ($result->result_array() as $row) {
                    $duree = round(10/((($height - 100)/ $weight) * $row['coefficient']));
                    $values = array(
                        'idRegime' => $row['idRegime'], 
                        'duree' => $duree,
                        'prix' => $row['prix'] * $duree
                        );
                    array_push($ans, $values);
                }
            }
            else{
                $sql = "SELECT * FROM regime WHERE coefficient < 0";
                $result = $this->db->query($sql);
                foreach ($result->result_array() as $row) {
                    $duree = round(10/((($height - 100)/ $weight) * -$row['coefficient']));
                    $values = array(
                        'idRegime' => $row['idRegime'], 
                        'duree' => $duree,
                        'prix' => $row['prix'] * $duree
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