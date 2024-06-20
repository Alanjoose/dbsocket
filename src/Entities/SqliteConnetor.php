<?php
/**
 * Sqlite connector class.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */
namespace Alanjoose\Dbsocket\Entities;

class SqliteConnetor extends BaseConnector
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return string
     */
    protected function buildConnectionString(): string
    {
        return 'sqlite:' . $this->getDbname();
    }
}
