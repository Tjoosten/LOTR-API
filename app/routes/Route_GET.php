<?php

  /**
   * GET Routes
   * @return JSON array's
   */
  $api->get('/', function() use($api) {
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody('{ "The api is running!" }');
  });

  $api->get('/all', function() use($api) {
    $query = \User::all()
                  ->toJson();
    // Response
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });

  $api->get('/gender/:value', function($value) use($api) {
    $query = \User::Where('Gender', '=', $value)
                  ->get()
                  ->toJson();

    // Response
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });

  $api->get('/race/:value', function($value) use($api) {
    $query = \User::Where('Race', '=', $value)
                  ->get()
                  ->toJson();

    // Response
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });

  $api->get('/:id', function($id) use($api) {
    $query = \User::Where('Swapi_id', '=', $id)
                  ->get()
                  ->toJson();

    // Response
    $api->response->headers->set('Content-type', 'application/json');
    $api->response->setBody($query);
  });
