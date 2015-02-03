<?php

  require 'vendor/autoload.php';


  $api = new \Slim\Slim();
  $con = new mysqli('localhost', 'root', '2fU3g5Yn', 'SWAPI');

  // Routes
  $api->get('/', function () {
    echo '{ Info: { The Api is running.  } }';
  });

  $api->get('/Orcs', function() use($con) {
    $query =$con->query("SELECT * FROM API WHERE Race = 'Orcs'")
                ->fetch_array(MYSQLI_ASSOC);

    if (count($query) == 0) {
        echo '{"error": "Could not get results from the database"}';
    } elseif (count($query) > 0) {
      echo '{"Orcs": ' . json_encode($query) . '}';
    }
  });

  // Bootstrap the API
  $api->run();
