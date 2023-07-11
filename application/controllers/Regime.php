<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regime extends CI_Controller {
    public function index(){
        $this->load->model('Regime_model');
        $data['objet']=$this->Regime_model->getDetail($_GET['id'], $_GET['duree']); 
        $this->load->view('regime',$data);
    }
    public function pdf(){
        $this->load->model('Regime_model');
        
        $data['objet']=$this->Regime_model->getDetail($_GET['id'], $_GET['duree']);
        $this->load->model('Login_model');
        $data['olona']=$this->Login_model->olona($_SESSION['idUser']);  
        $this->load->view('pdf',$data);
    }

    public function imcForm(){
        $this->load->view('header');
        $this->load->view('imc_form');
    }

    public function IMC(){
        $weight = $_GET['weight'];
        $height = $_GET['height'];
        $this->load->model('Regime_model');
        $imc = $this->Regime_model->getImc($weight, $height);
        $comp = "Votre IMC est " . $imc; 
        $data['message'] = "";
        if ($imc < 19) {
            $data['message'] = "Vous devez gagner du poids. " . $comp;
        }
        elseif($imc > 25){
            $data['message'] = "Vous devez perdre du poids. " . $comp;
        }
        else $data['message'] = "Vous etes bien équilibré. " . $comp;
        $this->load->view('header',$data);
        $this->load->view('imc_form');
    }
   
}