<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("users_model");



    }


    public function index(){

        session_start();
        if(!$_SESSION['user']){

            $_SESSION['user'] = FALSE;
            $data["title"] = 'Login - CodeIgniter';
            $data["msg"] = 'Você precisa estar logado para acessar esta página!';
            $this->load->view('pages/login', $data);
            return false;

        }

        //o que vem depois de edit/ na url, será recebido como parâmetro
        //chamar a model e utilizar o método index;
        $this->load->model("users_model");
        //depois da model carregada, chamamos o método desejado
        $data["users"] =  $this->users_model->findAll();
        $data["title"] = 'Usuários - CodeIgniter';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);


    }
    public function store(){


        $this->load->model("users_model");

        $user = array(
            "name" => $_POST["name"],
            //as linhas abaixo e acima fazem "a mesma coisa"
            "country" => $this->input->post("country"),
            "email" => $_POST["email"],
            "password" => md5($_POST["password"])
        );

        $this->users_model->store($user);
        redirect("login");
    }

    public function edit($id){
        session_start();
        if(!$_SESSION['user']){

            $_SESSION['user'] = FALSE;
            $data["title"] = 'Login - CodeIgniter';
            $data["msg"] = 'Você precisa estar logado para acessar esta página!';
            $this->load->view('pages/login', $data);
            return false;

        }

        //o que vem depois de edit/ na url, será recebido como parâmetro
        //chamar a model e utilizar o método index;

        //depois da model carregada, chamamos o método desejado
        $data["user"] = $this->users_model->findById($id);
        $data["title"] = 'Editar Usuario - CodeIgniter';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/form-users', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);

    }


    public function update($id){
        // resolver problema da senha
        $user = $_POST;
        $this->users_model->update($id,$user);
        redirect('users');
    }




}
