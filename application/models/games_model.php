<?php

class games_model extends CI_Model{

    public function index(){

        return $this->db->get('tb_games')->result_array();

    }
}