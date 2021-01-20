<?php
  if ( ! defined('BASEPATH')) exit ('No direct script access allowed');
  /**
   *
   */
  class Etudiant_DB extends CI_Model
  {

    public function save($etudiant){
      $date = date("m/d/Y h:i:s a", time());
      $etudiant['pwd'] = sha1($etudiant['pwd']);
      $token = array('numeroETU' => $etudiant['numETU'],
                      'tokenETU' => sha1($etudiant['numETU'].$date)
                    );
      $this->db->insert('etudiant',$etudiant);
      $this->db->insert('token', $token);
    }

    public function get($etu, $pwd){
      if(!empty($etu) && !empty($pwd)){
        $data = $this->db->get_where("etudiant", ['numETU' => $etu, 'pwd' => sha1($pwd)])->row_array();
      }else{
        $data = $this->db->get("etudiant")->result();
      }
      return $data;
    }

    public function modify($modif, $etu){
      $this->db->update('etudiant', $modif, array('numETU'=>$etu));
    }
  }

 ?>
