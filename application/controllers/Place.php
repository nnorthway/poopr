<?php
class Place extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function getPlaceRating() {
    $id = $this->input->post('id');
    $query = $this->db->select('average, total_votes')->from('places')->where('place_id', $id);
    $result = $this->db->get();
    $row = $result->row_array();
    if (count($row)) {
      echo json_encode($row);
    } else {
      echo false;
    }
  }

  public function getPlaceRatingById($place_id) {
    $query = $this->db->select('average, total_votes')
      ->from('places')
      ->where('place_id', $place_id);
    $result = $this->db->get();
    $row = $result->row_array();
    if (count($row)) {
      return $row;
    } else {
      return false;
    }
  }

  public function addPlaceRating() {
    //if user isset, assign the user variable to it's values
    $user = null;
    $data = array(
      'place_id' => $this->input->post('place_id'),
      'stars' => $this->input->post('rating'),
      'comment' => $this->input->post('comment'),
      'user_id' => isset($user['id'])?$user['id']:null,
    );
    $ratingExists = $this->getPlaceRatingById($data['place_id']);
    if ($ratingExists != false) {
      //insert rating

      //return true
    } else {
      //return redirect
    }
  }
}
