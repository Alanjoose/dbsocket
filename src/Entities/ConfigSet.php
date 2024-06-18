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
     * @var string
     */
    protected string $username;

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
        $this->driver = getenv('DB_DRIVER');
        $this->host = getenv('DB_HOST') ?? null;
        $this->port = getenv('DB_PORT') ?? null;
        $this->dbname = getenv('DB_NAME');
        $this->username = getenv('DB_USERNAME') ?? 'root';
        $this->password = getenv('DB_PASSWORD');
        $this->charset = getenv('DB_CHARSET') ?? 'utf8';
    }

    /**
     * Add a new option to configs set.
     * @param int $option
     * @param string|int $value
     * @return $this
     */
    public function addOption(int $option, string|int $value): self
    {
        $this->options[$option] = $value;
        return $this;
    }

    /**
     * Reset the configs set options.
     * @return $this
     */
    public function resetOptions(): self
    {
        $this->options = [];
        return $this;
    }

    /**
     * Remove an option from configs set.
     * @param int $option
     * @return $this
     */
    public function removeOption(int $option): self
    {
        unset($this->options[$option]);
        return $this;
    }

    /**
     * Return the configs set as a json string.
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this, JSON_PRETTY_PRINT);
    }
}
