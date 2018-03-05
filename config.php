<?php
require_once __DIR__ . '/vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

class Config {
  public static $parameters;

  public static function getDatabaseDSN()
  {
      return self::$parameters['database']['dsn'];
  }
}

Config::$parameters=Yaml::parseFile( __DIR__ . '/parameters.yml');

echo Config::$parameters['database']['dsn'];
