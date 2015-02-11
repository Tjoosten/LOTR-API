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

  # Create log pipeline
  $log = new Logger('API');
  $log->pushHandler(new StreamHandler('../app/log/API.log', Logger::INFO));

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
  $api->get('/all', function() use($api, $log) {
    $query = \User::all()
                  ->toJson();
    # Response
    $log->addInfo(count($query) .' Record(s) retrieved.');

    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });

  # GET www.domain.com/gender/:value
  $api->get('/gender/:value', function($value) use($api, $log) {
    $query = \User::Where('Gender', '=', $value)
                  ->get()
                  ->toJson();

    if($api->response->getStatus() == 200) {
      # Response
      $log->addInfo(count($query) .' Record(s) retrieved.');

      $api->response->headers->set('Content-type', 'application/json');
      $api->response->setBody($query);
    }
  });

  # GET www.domain.com/race/:value
  $api->get('/race/:value', function($value) use($api, $log) {
    $query = \User::Where('Race', '=', $value)
                  ->get()
                  ->toJson();

    if($api->response->getStatus() == 200) {
      # Response
      $log->addInfo(count($query) .' Record(s) retrieved.');

      $api->response->headers->set('Content-type', 'application/json');
      $api->response->setBody($query);
    }
  });

  # GET www.domain.com/:id
  $api->get('/:id', function($id) use($api, $log) {
    $query = \User::Where('Swapi_id', '=', $id)
                  ->get()
                  ->toJson();

    # Response
    $log->addInfo(count($query) .' Record(s) retrieved.');

    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });

  # Bootstrap everything
  $api->run();
