<?php
class Main extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('MainModel');
    $this->load->model('UserModel');
    $this->load->model('PlaceModel');
  }

  public function index() {
    $this->home();
  }

  public function home() {
    $data['title'] = "Poopr | Rate Public Restrooms";
    $this->load->view('main/templates/header.php', $data);
    $this->load->view('main/home.php', $data);
    $this->load->view('main/templates/footer.php', $data);
  }

  public function about() {
    $data['title'] = "About | Poopr";
    $this->load->view('main/templates/header.php', $data);
    $this->load->view('main/about.php', $data);
    $this->load->view('main/templates/footer.php', $data);
  }

  public function contact() {
    $data['title'] = "Contact | Poopr";
    $this->load->view('main/templates/header.php', $data);
    $this->load->view('main/contact.php', $data);
    $this->load->view('main/templates/footer.php', $data);
  }

  public function privacy() {
    $data['title'] = "Privacy | Poopr";
    $this->load->view('main/templates/header.php', $data);
    $this->load->view('main/privacy.php', $data);
    $this->load->view('main/templates/footer.php', $data);
  }

  public function place($id = null) {
    if ($id === null) {
      $place = $this->MainModel->getRandomPlace();
    } else {
      $place = $this->MainModel->getPlace($id);
    }
    $this->load->view('main/templates/header.php', $data);
    $this->load->view('main/place.php', $data);
    $this->load->view('main/templates/footer.php', $data);
  }

  public function rate($place_id) {
    $this->load->helper('form');
    $data['title'] = "Rate a new place | Poopr";
    $data['place_id'] = $place_id;
    $this->load->view('main/templates/header.php', $data);
    $this->load->view('main/rate.php', $data);
    $this->load->view('main/templates/footer.php', $data);
  }
}
