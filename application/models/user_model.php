<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model{
        public function insert_detail($idUser, $sexe, $taille, $poids){
            $sql = "INSERT INTO detail_user VALUES(%s, %s, %s, %s)";
            $sql = sprintf($sql, $idUser, $this->db->escape($sexe), $this->db->escape($taille), $this->db->escape($poids));
            echo $sql;
        }
    }
?>