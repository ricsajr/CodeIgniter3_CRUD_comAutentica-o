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
        $user = $this->users_model->findById($id);
        $data['id'] = $user['id'];
        $data['name'] = $user['name'];
        $data['email'] = $user['email'];
        $data['country'] = $user['country'];


        $data["title"] = 'Editar Usuario - CodeIgniter';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/nav-top', $data);
        $this->load->view('pages/form-users', $data);
        $this->load->view('templates/footer', $data);
        $this->load->view('templates/js', $data);

    }


    public function update($id){
        // resolver problema da senha
        $preuser = $this->users_model->findById($id);

        $user = $_POST;
       // $user['id'] = $id;
        $user['password'] = $preuser['password'];

        if($this->users_model->atualiza($id,$user)){
            $data["users"] =  $this->users_model->findAll();
            $data["title"] = 'Usuários - CodeIgniter';
            $data["msg"] = 'Usuário alterado com sucesso!';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav-top', $data);
            $this->load->view('pages/users', $data);
            $this->load->view('templates/footer', $data);
            $this->load->view('templates/js', $data);
        }else{
            $data["users"] =  $this->users_model->findAll();
            $data["title"] = 'Usuários - CodeIgniter';
            $data["msg"] = 'Erro ao alterar usuário.';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/nav-top', $data);
            $this->load->view('pages/users', $data);
            $this->load->view('templates/footer', $data);
            $this->load->view('templates/js', $data);
        }


    }

    public function delete($id){
        $this->users_model->destroy($id);
        redirect("users");
    }




}
