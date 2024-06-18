<?php
/**
 * Base connector class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

abstract class BaseConnector
{
    /**
     * DBMS driver.
     * @var string
     */
    protected string $driver;

    /**
     * Database server host. (Omit if using unix_socket or sqlite).
     * @var string|null
     */
    protected ?string $host;

    /**
     * Database service port. (Omit if using unix_socket or sqlite).
     * @var int|null
     */
    protected ?int $port;

    /**
     * Database name.
     * @var string
     */
    protected string $dbname;

    /**
     * DBMS username.
     * @var string|null
     */
    protected ?string $username;

    /**
     * DBMS password.
     * @var string|null
     */
    protected ?string $password;

    /**
     * Database charset collation.
     * @var string
     */
    protected string $charset;

    /**
     * PDO connection options.
     * @var array
     */
    protected array $options = [];

    public function __construct()
    {
        $configSet = new ConfigSet();
        $this->driver = $configSet->get('driver');
        $this->host = $configSet->get('host');
        $this->port = $configSet->get('port');
        $this->dbname = $configSet->get('dbname');
        $this->username = $configSet->get('username');
        $this->password = $configSet->get('password');
        $this->charset = $configSet->get('charset', 'utf8');
    }
}
