<?php
/**
 * Mysql connector class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

class MysqlConnector extends BaseConnector
{
    private bool $useUnixSocket;

    public function __construct(bool $useUnixSocket = false)
    {
        $this->useUnixSocket = $useUnixSocket;
        parent::__construct();
    }

    /**
     * @return string
     */
    protected function buildConnectionString(): string
    {
        if($this->useUnixSocket){
            $connectionString = 'mysql:unix_socket=' . $this->getHost()
            . ';dbaname=' . $this->getDbname() . ';charset=' . $this->getCharset();
        }
        else {
            $connectionString = 'mysql:host=' . $this->getHost()
            . ';port=' . $this->getPort() . ';dbname=' . $this->getDbname()
            . ';charset=' . $this->getCharset();
        }
        return $connectionString;
    }
}
