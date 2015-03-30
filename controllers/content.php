<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/16/2015
 * Time: 11:12 AM
 */

require_once('controllers/baseController.php');
require_once('models/adverts.php');

class contentController extends baseController {

public function index($params = array()) {

  $language = $params[1];
  $page = $params[3];
  $destination = "content/$page";

  include("static/$language/$page.php");

}

}