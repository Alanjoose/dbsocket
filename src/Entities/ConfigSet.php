<?php
/**
 * Connector configuration object class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

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
           'driver' => getenv('DB_DRIVER'),
           'host' => getenv('DB_HOST'),
           'port' => getenv('DB_PORT'),
           'dbname' => getenv('DB_NAME'),
           'username' => getenv('DB_USERNAME'),
           'password' => getenv('DB_PASSWORD'),
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
}
