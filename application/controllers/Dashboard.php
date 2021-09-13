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

            $config = array(
                "base_url" => base_url('dashboard/p'),
                "per_page" => 2, // numero de games por pagina
                "num_links" => 3, // tamanho do grupo de paginas
                "uri_segment" => 3,//posição na url
                "total_rows" => $this->games_model->countAll(),
                "full_tag_open" => "<ul class='pagination'>",
                "full_tag_close" => "</ul>",
                "first_link" => FALSE,
                "last_link" => FALSE,
                "first_tag_open" => "<li>",
                "first_tag_close" => "</li>",
                "prev_link" => "Anterior",
                "prev_tag_open" => "<li class='prev'>",
                "prev_tag_close" => "</li>",
                "next_link" => "Próxima",
                "next_tag_open" => "<li class='next'>",
                "next_tag_close" => "</li>",
                "last_tag_open" => "<li>",
                "last_tag_close" => "</li>",
                "cur_tag_open" => "<li class='active'><a href='#'>",
                "cur_tag_close" => "</a></li>",
                "num_tag_open" => "<li>",
                "num_tag_close" => "</li>",

             );

            $this->pagination->initialize($config);

            $data["pagination"] = $this->pagination->create_links();

            //depois da model carregada, chamamos o método desejado
            $offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["games"] =  $this->games_model->index($config["per_page"], $offset);
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
