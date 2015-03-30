<?php
/**
 * Created by PhpStorm.
 * User: Adi
 * Date: 1/16/2015
 * Time: 11:12 AM
 */

require_once('controllers/baseController.php');
require_once('models/adverts.php');

class homeController extends baseController {

public function index($params = array()) {

  $adv = AdvertsModel::getInstance();
  $res = $adv::getAdvertsHome();

  $data = array();
  $data['latest_adverts'] = $res['latest_adverts'];
  $data['special_adverts'] = $res['special_adverts'];

  $this->render($data);
}

}