<?php
namespace Drupal\d8cards\Controller;

use Drupal\Core\Controller\ControllerBase;

class D8pageController extends ControllerBase {

  public function d8page(){
    $element = array(
      '#markup' => 'Hello, world',
    );
    return $element;
  }

}
