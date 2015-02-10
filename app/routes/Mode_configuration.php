<?php

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
