<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Transaction extends CI_Controller{
        public function index(){
            $data['title'] = "My Account";
            $this->load->model('User_model');
            $data['user_pic'] = $this->User_model->getImg($_SESSION['idUser']);
            $idAccount = $this->User_model->getAccount($_SESSION['idUser']);
            $this->load->model('Transaction_model');
            $data['balance'] = $this->Transaction_model->getAccountValue($idAccount);
            $this->load->view('monnaie_nav',$data);
            $this->load->view('myAccount',$data);
        }

        public function faire_demande(){
            $data['title'] = "Credit";
            $this->load->view('monnaie_nav',$data);
            $this->load->model('Transaction_model');
            $this->load->model('User_model');
            $codes = $this->Transaction_model->getValidCode();
            $used = $this->Transaction_model->getInvalidCode();
            $data['codes'] = array();
            foreach ($codes as $row) {
                array_push($data['codes'], $this->Transaction_model->getCode($row));
            }
            $data['used'] = array();
            foreach ($used as $row) {
                array_push($data['used'], $this->Transaction_model->getCode($row));
            }
            $idAccount = $this->User_model->getAccount($_SESSION['idUser']);
            if (isset($_POST['code'])) {
                $data['response'] = $this->Transaction_model->demandeCredit($idAccount,$_POST['code']);
                $this->load->view('porte_monnaie', $data);
            }
            else {
                $this->load->view('porte_monnaie', $data);   
            }
        }

        public function myAccount(){
            $this->load->model('User_model');
            $data['title'] = 'Mon compte';
            $data['image'] = $this->User_model->getImg($_SESSION['idUser']);
            $this->load->view('monnaie_nav',$data);
            $this->load->view('MyAccount',$data);
        }
    }
?>