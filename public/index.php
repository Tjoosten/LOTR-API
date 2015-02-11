<?php

  /**
   * @author    Tim Joosten
   * @package   LOTR Api
   * @license   MIT License
   * @copyright Tim Joosten, 2015
   */

  require '../vendor/autoload.php';

  use Monolog\Logger;
  use Monolog\Handler\StreamHandler;

  # Setting up classes.
  $api  = new Slim\Slim(['mode'  => 'development']);

  /**
   * Mode configuration
   */
  $api->configureMode('development', function() use($api) {
    $api->config([
        'log.enable' => false,
        'debug' => true
    ]);
  });

  $api->configureMode('production', function() use($api) {
    $api->config([
        'log.enable' => true,
        'debug' => false
      ]);
  });

  /**
   * GET Routes
   * @return JSON array's
   */
  $api->get('/', function() use($api) {
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody('{ "The api is running!" }');
  });

  # GET www.domain.com/all
  $api->get('/all', function() use($api) {
    $query = \User::all()
                  ->toJson();
    # Response
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });

  # GET www.domain.com/gender/:value
  $api->get('/gender/:value', function($value) use($api) {
    $query = \User::Where('Gender', '=', $value)
                  ->get()
                  ->toJson();

    if($api->response->getStatus() === 200) {
      $api->response->headers->set('Content-type', 'application/json');
      $api->response->setBody($query);
    }
  });

  # GET www.domain.com/race/:value
  $api->get('/race/:value', function($value) use($api) {
    $query = \User::Where('Race', '=', $value)
                  ->get()
                  ->toJson();

    if($api->response->getStatus() === 200) {
      $api->response->headers->set('Content-type', 'application/json');
      $api->response->setBody($query);
    }
  });

  # GET www.domain.com/:id
  $api->get('/:id', function($id) use($api) {
    $query = \User::Where('Swapi_id', '=', $id)
                  ->get()
                  ->toJson();

    # Response
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });

  /**
   * PUT routes
   */

  # url: PUT www.domain.com/insert/character
  # cli: curl -X PUT -d '{"json":123}' http://localhost:8000/test
  # php: <php option>
  $api->put('/test', function() use($api) {
    $user = new \User();
    $user->Name = "Tim";
    $user->save();
  });

  # Bootstrap everything
  $api->run();
