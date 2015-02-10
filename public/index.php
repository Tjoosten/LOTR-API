<?php

  /**
   * @author    Tim Joosten
   * @package   LOTR Api
   * @license   MIT License
   * @copyright Tim Joosten, 2015
   */

  require '../vendor/autoload.php';

  // Setting up classes.
  $api  = new Slim\Slim(['mode'  => 'development']);

  require_once "../app/routes/Mode_configuration.php";
  require_once "../app/routes/Route_GET.php";

  // Bootstrap everything
  $api->run();
