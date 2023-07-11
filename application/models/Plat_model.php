<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Plat_model extends CI_Model{
        public function getplat(){
            $sql = "SELECT * from plat";
            $rows = $this->db->query($sql);
            return $rows->result_array();
        }
        public function getplatwithid($id){
            $sql = "SELECT * from plat where idPlat=".$id."";
            $rows = $this->db->query($sql);
            return $rows->result_array();
        }
        public function getAllUnite(){
            $sql = "SELECT * FROM unite";
            $result = $this->db->query($sql);
            $ans = array();
            foreach($result->result_array() as $row){
                array_push($ans, $row);
            }
            return $ans;
        }

        public function insert(){
            $sql = "INSERT INTO plat VALUES(null,%s,%s,%s,%s)";
            $sql = sprintf($sql, $this->db->escape($_POST['nom']),null,$this->db->escape($_POST['description']),$_POST['unite'],$this->db->escape($_FILES['photo']['name']));
            $this->db->query($sql);
        }

        public function upload_file(){
            $config['upload_path'] = 'assets/img/';
            $config['allowed_types'] = 'jpg|jpeg|png|JPG|JPEG|PNG';
            $config['file_name'] = $_FILES['user_pic']['name'];
            $config['max_size'] = '300000';       
            
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('user_pic')) {
                return $_FILES['user_pic']['name'];
            } else {
                return "None";
            }
        }
    }
?>