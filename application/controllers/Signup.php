<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {


    public function index(){


        $data["title"] = 'Signup - CodeIgniter';

        $this->load->view('pages/signup', $data);

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

       /* $this->users_model->store($user);
        $this->load->library('email');

        $configs['mailtype'] = 'html';

        $this->email->initialize($configs);

        $this->email->from('ricardosantosaraujojunior@gmail.com', 'Ricardo Araújo');
        $this->email->to('ricardo.araujo@neki-it.com.br');


        $this->email->subject('Teste envio de email CodeIgniter');
        $this->email->message('Easy peasy lemon squeezy');

        //$this->email->send()*/

            redirect("login");


    }



}
