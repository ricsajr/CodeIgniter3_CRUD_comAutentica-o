<?php

class Search_model extends CI_Model{


    public function search($search){

        //se a busca for vazia, não faz a query
        if(empty($search)){
            return array();
        }

        $search = $this->input->post("busca");
        $this->db->like("name", $search); // busque na tabela name, o que for igual a busca
        return $this->db->get("tb_games")->result_array();


    }
}