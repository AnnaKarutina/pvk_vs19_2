<?php


class Core
{
  public function __construct()
  {
    $url = $this->getUrl();
    echo '<pre>';
    print_r($url);
    echo '</pre>';
  }

  public function getUrl(){
    if(isset($_GET['url'])){
      $url = $_GET['url'];
      $url = rtrim($url, '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}