<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function index(){

        //chamar a model e utilizar o método index;
        $this->load->model("games_model");
        //depois da model carregada, chamamos o método desejado
        $data["games"] =  $this->games_model->index();
        $data["title"] = 'Dashboard - CodeIgniter';

        $this->load->library('session');
        print_r($this->session->userdata());
        die();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/dashboard', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
    }



}
