<?php

namespace App\Globals;

use Exception;
use InvalidArgumentException;

/**
 * Class Globals
 * This class give security access to Globals variables
 *
 * @package Uraldecor\Globals
 */
class Globals
{
  /**
   * Store global variables as associative array
   *
   * @var array
   */
  private static $globals = [];

  /**
   * Initialize globals
   *
   * @param $fields
   * @throws Exception
   */
  public static function init()
  {
    $pathToSettings = $_SERVER['DOCUMENT_ROOT'].'/../env.php';

    if( !is_file($pathToSettings) )
    {
      throw new Exception("Settings file not found in '$pathToSettings'", 1);
    }

    self::$globals = include $pathToSettings;
  }

  /**
   * Get host name for connection to database
   *
   * @throws InvalidArgumentException
   * @return string
   */
  public static function getHost(): string
  {
    return self::getVariableDefaultPattern('host');
  }

  /**
   * Get user for connection to database
   *
   * @throws InvalidArgumentException
   * @return string
   */
  public static function getUser(): string
  {
    return self::getVariableDefaultPattern('user');
  }

  /**
   * Get password for connection to database
   *
   * @throws InvalidArgumentException
   * @return string
   */
  public static function getPassword(): string
  {
    return self::getVariableDefaultPattern('password');
  }

  /**
   * Get database name for connection to database
   *
   * @throws InvalidArgumentException
   * @return string
   */
  public static function getDatabase():string
  {
    return self::getVariableDefaultPattern('database');
  }

  /**
   * Pattern for search variable into globals array
   *
   * @param $variableName
   * @return string
   */
  private static function getVariableDefaultPattern($variableName): string
  {
    if( !isset(self::$globals[$variableName]) )
    {
      throw new InvalidArgumentException("Variable '$variableName' is not defined in global class", 2);
    }

    return self::$globals[$variableName];
  }
}