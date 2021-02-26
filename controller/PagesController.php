<?php

require_once __DIR__ . '/Controller.php';
require_once __DIR__ . '/../dao/EventsDAO.php';
require_once __DIR__ . '/../dao/LeadersDAO.php';

class PagesController extends Controller {

  // private $todoDAO;
  private $eventsDAO;
  private $leadersDAO;

  function __construct() {
   $this->eventsDAO = new EventsDAO();
   $this->leadersDAO = new LeadersDAO();
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
