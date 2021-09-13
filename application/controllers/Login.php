<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function index(){


        $data["title"] = 'Login - CodeIgniter';

        $this->load->view('pages/login', $data);

    }
    public function store(){

        $this->load->model("login_model");
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $user = $this->login_model->store($email, $password);

        if($user){

            session_start();
            $_SESSION['user'] = $user;

            redirect("dashboard");
        }
        else{
            redirect("login");
        }
    }

    public function logout(){

    }






}
