<?php

class Users_model extends CI_Model {

    public function findByid($id){

        return $this->db->get_where("tb_users", array(
            "id" => $id
        ))->row_array();
    }

    public function findAll(){
        return $this->db->get('tb_users')->result_array();
    }

    public function store($user){
        $this->db->insert("tb_users",$user);

    }

    public function atualiza($id,$user){
        $this->db->where('id',$id);
        return $this->db->update("tb_users", $user);
    }

    public function destroy($id){

        $this->db->where('id', $id);
        return $this->db->delete('tb_users');

    }


}