<?php

// start the session woodoo first

ini_set('session.gc_maxlifetime', 15 * 60); // expire after 15 mins
session_set_cookie_params(15 * 60);  // expire after 15 mins

$a = session_id();
if(empty($a)) session_start();

require_once ('helpers/helper.php');
require_once ('helpers/translator.php');

$userLanguage = getUserLanguage();

// parse URI
if (isset($_SERVER['REQUEST_URI'])) {

	$uri = $_SERVER['REQUEST_URI'];
	$params = explode('/', $uri);

	// get parameters from uri

	if (isset($params[1])) $language = $params[1];
	if (isset($params[2])) {
    $actionComponents = explode('?', $params[2]);
    $action = $actionComponents[0];
  }

	if (isset($params[3])) $id = $params[3];

	// update session language
  $_SESSION['language'] = $language;



  // pick up the right controller and its file

  if (isset($action)) {
    $controllerName = $action.'Controller';
    $controllerFileName = 'controllers' . DIRECTORY_SEPARATOR . $action . '.php';

    // call controller and let it do the job
    if (file_exists($controllerFileName)) {
      require_once($controllerFileName);
      $controllerInstance = new $controllerName;
      $controllerInstance->index($params);
      die(); // we're done here
    } else {
      echo "Controller file $controllerFileName not found";
    }
  }
}

// if we get here, something went wrong before. So we go to a place that we know that works ... hopefully ;)
redirect("$userLanguage/home/");

?>

