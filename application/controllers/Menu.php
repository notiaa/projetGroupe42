<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
        $this->load->view('accueil');
        $this->load->view('footer');
  	}
    public function porte(){
        $this->load->view('header');
        $this->load->view('footer');
    }
    public function commencer(){
        $this->load->view('header');
        $this->load->view('completion');
        $this->load->view('footer');
    }
	
}