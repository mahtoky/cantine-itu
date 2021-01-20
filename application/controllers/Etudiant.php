<?php
require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;
class Etudiant extends REST_Controller {
  /**
  * Get All Data from this method.
  *
  * @return Response
  */
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
  /**
  * Get All Data from this method.
  *
  * @return Response
  */
  public function index_get($etu="", $pwd="") {
    $this->load->model('Etudiant_DB');
    $data = $this->Etudiant_DB->get($etu, $pwd);
    $this->response($data, REST_Controller::HTTP_OK);
  }
  /**
  * Get All Data from this method.
  *
  * @return Response
  */
  public function index_post($log) {
    $this->load->model('Etudiant_DB');
    $input = $this->input->post();
    if($log == 'Login'){
      $this->load->model('Etudiant_DB');
      $data = $this->Etudiant_DB->get($input['numETU'], $input['pwd']);
      $this->response($data, REST_Controller::HTTP_OK);
    }elseif($log == 'SignIn'){
      $this->Etudiant_DB->save($input);
      $this->response(['Etudiant created successfully.'], REST_Controller::HTTP_OK);
    }
  }
  /**
  * Get All Data from this method.
  *
  * @return Response
  */
  public function index_put($etu) {
    $this->load->model('Etudiant_DB');
    $input = $this->put();
    $this->Etudiant_DB->modify($input, $etu);
    $this->response(['Informations updated successfully.'], REST_Controller::HTTP_OK);
  }
  /**
  * Get All Data from this method.
  *
  * @return Response
  */
  public function index_delete($id){
    $this->db->delete('products', array('id'=>$id));
    $this->response(['Product deleted successfully.'], REST_Controller::HTTP_OK);
  }
}
