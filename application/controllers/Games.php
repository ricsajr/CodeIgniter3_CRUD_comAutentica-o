<?php

class Games extends CI_Controller{

    public function index(){

        //chamar a model e utilizar o método index;
        $this->load->model("games_model");
        //depois da model carregada, chamamos o método desejado
        $data["games"] =  $this->games_model->index();
        $data["title"] = 'Games - CodeIgniter';


        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
    }

    public function new(){

        $data["title"] = 'Games - CodeIgniter';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/form-games', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);
    }

}