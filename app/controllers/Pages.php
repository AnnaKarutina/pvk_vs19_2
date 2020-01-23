<?php


class Pages extends Controller
{
  /**
   * Page constructor.
   */
  public function __construct()
  {
    $this->pagesModel = $this->model('Page');
  }

  public function test(){
    $users = $this->pagesModel->getUsers();
    print_r($users);
  }

  public function edit(){
    $this->view('pages/edit');
  }

  public function index() {
    $data = array('title' => 'Welcome');
    $this->view('pages/index', $data);
  }
}