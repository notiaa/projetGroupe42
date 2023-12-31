<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function index()
	{
        $this->load->model('Plat');
        $data['objet']=$this->Plat->getplat();
		$this->load->view('header');
        $this->load->view('accueil',$data);
        $this->load->view('footer');
  	}
      public function indexwithid()
      {
          $this->load->model('Plat');
          $data['objet']=$this->Plat->getplatwithid($_GET['id']);
          $this->load->view('header');
          $this->load->view('detail',$data);
          $this->load->view('footer');
        }
    public function niveau(){
        $this->load->view('header');
        $this->load->view('niveau');
        $this->load->view('footer');
    }
    public function sport1(){
    $this->load->view('header');
    $this->load->view('sport');
    $this->load->view('footer');
}
    public function plat1(){
        $this->load->model('Plat_model');
        $data['unite'] = $this->Plat_model->getAllUnite();
        $this->load->view('header');
        $this->load->view('plat', $data);
        $this->load->view('footer');
    }

    public function porte(){
        $this->faire_demande();
    }

    public function Account(){
        $this->load->model('Transaction_model');
        $this->load->model('User_model');
        $idAccount = $this->User_model->getAccount($_SESSION['idUser']);
        $data['user_info'] = $this->User_model->getUserInfo($_SESSION['idUser']);
        $data['balance'] = $this->Transaction_model->getAccountValue($idAccount);
        $data['title'] = 'Mon compte';
        $data['image'] = $this->User_model->getImg($_SESSION['idUser']);
        $this->load->view('monnaie_nav',$data);
        $this->load->view('MyAccount',$data);
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

    public function commencer(){
        $this->load->model('user_model');
        $data['title'] = "Detail user";
        $data['user_pic'] = $this->user_model->getImg($_SESSION['idUser']);
		$this->load->view('header', $data);
        $this->load->view('header');
        $this->load->view('completion');
        $this->load->view('footer');
    }
    public function sport(){
        $this->load->model('Admin'); 
        $this->load->model('user_model');
        $user_pic = $this->user_model->upload_file();
       
        $this->Admin->insertSport($_GET['nom'],$_GET['description'],$_GET['unite'],$this->db->escape($user_pic));    
     
        $data['title'] = "Sport";
        $data['user_pic'] = $this->user_model->getImg($_SESSION['idUser']);
		$this->load->view('header', $data);
        $this->load->view('sport');
        $this->load->view('footer');
    }
    public function plat(){
        $this->load->model('Admin');
        $this->load->model('Plat_model');
        $this->Plat_model->insert(); 
        $this->load->model('user_model');
        $data['title'] = "Plats";
        $data['user_pic'] = $this->user_model->getImg($_SESSION['idUser']);
		$this->load->view('header', $data);
        $this->load->view('plat');
        $this->load->view('footer');
    }
    
    public function graphe(){
        $this->load->model('user_model');
        $data['title'] = "Graphe";
        $data['user_pic'] = $this->user_model->getImg($_SESSION['idUser']);
		$this->load->view('header', $data);
        $this->load->view('header');
        $this->load->view('graphe');
        $this->load->view('footer');
    }
    public function code(){
        $this->load->view('header');
        $this->load->view('code');
        $this->load->view('footer');
    }
    public function code1(){
        $this->load->model('Transaction_model');
      
        $this->Transaction_model->generateCode($_GET['montant']); 
        $this->load->view('header');
        $this->load->view('code');
        $this->load->view('footer');
    }
}