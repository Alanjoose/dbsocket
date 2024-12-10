<?php
/**
 * Pgsql connector class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

class PgsqlConnector extends MysqlConnector
{
    //TODO: Implement SSL mode.
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    protected function buildConnectionString(): string
    {
        $connectionString = 'pgsql:host=' . $this->getHost() . ';port=' . $this->getPort() .
        ';dbname=' . $this->getDbname() . ';user=' . $this->getUsername() . ';password=' . $this->getPassword();
        return $connectionString;
    }
}
