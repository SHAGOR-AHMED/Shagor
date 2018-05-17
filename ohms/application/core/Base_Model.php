<?php

class Base_Model extends CI_Model{

    public function debug($data){

        echo "<pre>";
        print_r($data);
        exit();
    }

    public function commonInsert($tbl, $data){

        return $this->db->insert($tbl, $data);
    }

    public function commonUpdate($UserID, $tbl){

        return $this->db->where('id', $UserID)->update($tbl);

    }

}//Base_Model

?>