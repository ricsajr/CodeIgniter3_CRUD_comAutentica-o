<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    public function index(){

        session_start();
        if(!$_SESSION['user']){

            $_SESSION['user'] = FALSE;
            $data["title"] = 'Login - CodeIgniter';
            $data["msg"] = 'Você precisa estar logado para acessar esta página!';
            $this->load->view('pages/login', $data);

        }
        else{
            //chamar a model e utilizar o método index;
            $this->load->model("games_model");
            //depois da model carregada, chamamos o método desejado
            $data["games"] =  $this->games_model->index();
            $data["title"] = 'Dashboard - CodeIgniter';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav-top', $data);
            $this->load->view('pages/dashboard', $data);
            $this->load->view('templates/footer', $data);
            $this->load->view('templates/js', $data);
        }
    }
    public function search(){

        session_start();
        if(!$_SESSION['user']){

            $_SESSION['user'] = FALSE;
            $data["title"] = 'Login - CodeIgniter';
            $data["msg"] = 'Você precisa estar logado para acessar esta página!';
            $this->load->view('pages/login', $data);

        }
        else{
            //chamar a model e utilizar o método index;
            $this->load->model("search_model");
            //depois da model carregada, chamamos o método desejado
            $data["title"] = 'Resultado da Pesquisa por -'.$_POST["busca"];
            $data["result"] =  $this->search_model->search($_POST);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav-top', $data);
            $this->load->view('pages/resultado', $data);
            $this->load->view('templates/footer', $data);
            $this->load->view('templates/js', $data);
        }
    }










}
