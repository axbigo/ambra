<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/16/2015
 * Time: 12:21 PM
 */

require_once ('_config/config.php');
require_once ('helpers/helper.php');


abstract class baseModel
{
  public static $db;

  protected function __construct()
  {

    $db = new mysqli(BC_DB_HOST, BC_DB_USER, BC_DB_PASS, BC_DB_NAME);
    if ($db->connect_errno) {
      echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
    } else {
      $db->set_charset('utf8');
      self::$db = $db;
    }
  }

  final public static function getInstance()
  {
    static $instances = array();

    $calledClass = get_called_class();

    if (!isset($instances[$calledClass]))
    {
      $instances[$calledClass] = new $calledClass();
    }

    return $instances[$calledClass];
  }

  final private function __clone()
  {
  }
}


