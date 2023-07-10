<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Regime_model extends CI_Model{
        public function getDetail($idRegime){
            $sql = "SELECT dr.idRegime, c.nom, c.description, dr.quantite, u.value, '1 jour' as duree from detail_regime as dr JOIN composant as c ON dr.idcomposant=c.idcomposant JOIN unite as u ON c.idUnite=u.idUnite WHERE dr.idregime=%s";
            $sql = sprintf($sql, $idRegime);
            $rows = $this->db->query($sql);
            return $rows->result_array();
        }

        public function getRegimeFit($gain, $height, $weight){

        }
    }
?>