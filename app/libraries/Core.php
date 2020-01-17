<?php


class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';
  public function __construct()
  {
    $url = $this->getUrl();
    // controller
    $controllerName = ucwords($url[0]);
    $controllerFileName = '../app/controllers/'.$controllerName.'.php';
    if(file_exists($controllerFileName)){
      $this->currentController = $controllerName;
      unset($url[0]);
    }
    require_once $controllerFileName;
    $this->currentController = new $this->currentController;
    // method
    $methodName = $url[1];
    if(method_exists($this->currentController, $methodName)){
      $this->currentMethod = $methodName;
      unset($url[1]);
    }

    echo $methodName;
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