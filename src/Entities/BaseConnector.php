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
        $this->host = $configSet->get('host');
        $this->port = $configSet->get('port');
        $this->dbname = $configSet->get('dbname');
        $this->username = $configSet->get('username');
        $this->password = $configSet->get('password');
        $this->charset = $configSet->get('charset', 'utf8');
    }

    /**
     * Mount and return the connector data source name (DSN).
     * @return string
     */
    abstract protected function buildConnectionString(): string;

    /**
     * @return string|null
     */
    protected function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * @return int|null
     */
    protected function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @return string
     */
    protected function getDbname(): string
    {
        return $this->dbname;
    }

    /**
     * @return string|null
     */
    protected function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * @return string|null
     */
    protected function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    protected function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Add a new option to connector options.
     * @param string|int $option
     * @param $value
     * @return self
     */
    public function addOption(string|int $option, $value): self
    {
        $this->options[$option] = $value;
        return $this;
    }

    /**
     * Set the connector options as a complete array.
     * @param array $options
     * @return $this
     */
    public function defineOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Remove an option from connector options.
     * @param string|int $option
     * @return $this
     */
    public function removeOption(string|int $option): self
    {
        unset($this->options[$option]);
        return $this;
    }

    /**
     * Reset the connector options.
     * @return $this
     */
    public function resetOptions(): self
    {
        $this->options = [];
        return $this;
    }

    /**
     * Set the options as preset data based on driver.
     * @return $this
     */
    public function useStandardOptions()
    {
        $driver = $_ENV['DB_DRIVER'];
        $this->options = ConfigSet::getPresetFor($driver);
        return $this;
    }

    public function connect(): \PDO
    {
        try
        {
            $connectionString = $this->buildConnectionString();
            $pdoObject = new \PDO($connectionString, $this->username, $this->password, $this->options);
            return $pdoObject;
        }
        catch (\PDOException|\Exception $exception)
        {
            unset($pdoObject);
            printf('DBSOCKET ERROR: %s', $exception->getMessage());
            die($exception->getCode());
        }
    }
}
