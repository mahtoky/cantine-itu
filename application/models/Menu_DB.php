<?php
  if ( ! defined('BASEPATH')) exit ('No direct script access allowed');
  /**
   *
   */
  class Menu_DB extends CI_Model
  {

    public function getMenuToday(){
      $data = $this->db->get("menuToday")->result();
      return $data;
    }

    public function getMenuDay($date){
      $data = $this->db->get_where("MENUPERDAY", ['dateMenu' => $date])->result();
      return $data;
    }
  }

 ?>
