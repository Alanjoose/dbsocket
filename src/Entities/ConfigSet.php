<?php
/**
 * Connector configuration object class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

use Alanjoose\Dbsocket\Enums\ConnectorEnum;
use PDO;

class ConfigSet
{
   /**
    * Config data.
    * @var array
   */
   private array $configSet;

   public function __construct()
   {
       $this->configSet = [
           'host' => $_ENV['DB_HOST'] ?? null,
           'port' => $_ENV['DB_PORT'] ?? null,
           'dbname' => $_ENV['DB_NAME'] ?? '',
           'username' => $_ENV['DB_USERNAME'] ?? null,
           'password' => $_ENV['DB_PASSWORD'] ?? null,
           'charset' => $_ENV['DB_CHARSET'] ?? null,
       ];
   }

    /**
     * Get config by key.
     * @param string $key
     * @param $default
     * @return mixed|null
     */
   public function get(string $key, $default = null): mixed
   {
       return $this->configSet[$key] ?? $default;
   }

    /**
     * Get a preset based on driver.
     * @param string $driver
     * @return array
     */
   public static function getPresetFor(string $driver)
   {
       $connectorEnum = match($driver) {
           'mysql' => ConnectorEnum::MYSQL,
           'sqlite' => ConnectorEnum::SQLITE,
       };

       switch($connectorEnum)
       {
           case ConnectorEnum::MYSQL:
               return [
                   PDO::ATTR_AUTOCOMMIT => 0,
                   PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                   PDO::ATTR_CASE => PDO::CASE_NATURAL,
                   PDO::ATTR_PERSISTENT => false,
               ];
           break;
           case ConnectorEnum::SQLITE:
                return [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_PERSISTENT => true,
                ];
           break;
       }
   }
}
