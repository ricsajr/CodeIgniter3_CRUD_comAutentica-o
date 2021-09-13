<?php

class Games_model extends CI_Model{

    public function index($limit = null, $offset = null){

        if($limit){
            $this->db->limit($limit, $offset);//limit é um método da lib pagination;
        }

        return $this->db->get('tb_games')->result_array();

    }

    public function store($game){
        $this->db->insert("tb_games", $game);
    }

    public function show($id){

        return $this->db->get_where("tb_games", array(
           "id" => $id
        ))->row_array();
    }

    public function update($id, $game){

        //construindo a query
        //onde id == $id
        $this->db->where('id', $id);
        //as duas linhas formam a mesma query
        return $this->db->update("tb_games", $game);
    }

    public function destroy($id){

        $this->db->where('id', $id);
        return $this->db->delete("tb_games");

    }

    public function countAll(){
        return $this->db->count_all('tb_games');
    }
}