<?php
/**
 * Connector router class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

class ConnectorRouter
{
    /**
     * Get the connector instance by driver on env.
     * @return BaseConnector
     */
    private static function getBasedDriverConnector(): BaseConnector
    {
        $driverFromEnv = $_ENV['DB_DRIVER'];
        return match($driverFromEnv) {
            'mysql' => new MysqlConnector(),
            'sqlite' => new SqliteConnetor(),
            default => null,
        };
    }

    /**
     * Get the connection based on current connector.
     * @return \PDO
     */
    public static function getConnection(): \PDO
    {
        $currentDriver = $_ENV['DB_DRIVER'];
        return self::getBasedDriverConnector()->defineOptions(ConfigSet::getPresetFor($currentDriver))->connect();
    }

    /**
     * Get the connector instance based on current connector.
     * @return BaseConnector
     */
    public static function getConnectorInstance(): BaseConnector
    {
        return self::getBasedDriverConnector();
    }
}
