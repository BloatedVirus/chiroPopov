<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/UserDAO.php';
require_once __DIR__ . '/../dao/ProtestDAO.php';
require_once __DIR__ . '/../dao/JoinDAO.php';

class PagesController extends Controller {

  // private $todoDAO;
  private $userDAO;
  private $protestDAO;
  private $joinDAO;

  function __construct() {
   $this->userDAO = new UserDAO();
   $this->protestDAO = new ProtestDAO();
   $this->joinDAO = new JoinDAO();
  }

  public function index() {
    $this->set('title', 'Welkom bij Chiro Popov');
  }

  public function bosfeesten() {
    $this->set('title', 'BOSFEESTEN');
  }

  public function about() {
    $this->set('title', 'Over Ons');
  }

  public function evenementen() {
    $this->set('title', 'Zie Wat We Organiseren');
  }

  public function afdelingen() {
    $this->set('title', 'Ontdek De Leiding');
  }

  public function gazet() {
    $this->set('title', 'Lees Wat Er Leeft');
  }

  public function detail() {
    $this->set('title', 'De belangrijke details');
  }
}
