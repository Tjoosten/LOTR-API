<?php

  require 'vendor/autoload.php';


  $api = new \Slim\Slim();
  $con = new mysqli('localhost', 'root', '2fU3g5Yn', 'SWAPI');

  // Routes
  $api->get('/', function () {
    echo '{ Info: { The Api is running.  } }';
  });

  $api->get('/Orcs', function() use($con) {
    $query = $con->query("SELECT swapi_id FROM API WHERE Race = 'Orcs'")->fetch_all(MYSQLI_ASSOC);

    echo '{"Orcs": ' . json_encode($query, JSON_PRETTY_PRINT) . '}';

  });

  // Bootstrap the API
  $api->run();
