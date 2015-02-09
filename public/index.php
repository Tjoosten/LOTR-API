<?php

  require '../vendor/autoload.php';

  $api = new Slim\Slim();

  $api->get('/', function() {
    echo '{ "The api is running!" }';
  });

  $api->get('/all', function() {
    $query = \User::all()
                  ->toJson();

    echo $query;
  });

  $api->get('/gender/:value', function($value) {
    $query = \User::Where('Gender', '=', $value)
                  ->get()
                  ->toJson();

    echo $query;
  });

  $api->get('/race/:value', function($value) {
    $query = \User::Where('Race', '=', $value)
                  ->get()
                  ->toJson();

    echo $query;
  });

  // Bootstrap everything
  $api->run();
