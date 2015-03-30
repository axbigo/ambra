<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/16/2015
 * Time: 11:41 AM
 */


class baseController {

  public function __construct() {
    $className = get_class($this);
    $this->myName = substr($className, 0, strlen($className) - 10);
  }

  public function index ($params = array()) {
    $data = array();
    $this->render($data);
  }

  public function render($data) {

    $viewPath = 'views' . DIRECTORY_SEPARATOR . strtolower($this->myName) . '.php';
    if (file_exists($viewPath)) {

      // prepare some data for the rendering (language switcher in the menu

      require_once('helpers/helper.php');
      $language = $_SESSION['language'];
      $uri = $_SERVER['REQUEST_URI'];
      $destination = substr($uri, 4);

      // render view
      include($viewPath);

    } else {
      echo 'No view: ' . $viewPath;
    }

  }

}