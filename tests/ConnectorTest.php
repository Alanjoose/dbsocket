<?php
/**
 * ConnectorTest test suit.
 * @author Alan José <alanjsyt@gmail.com>
 * @since v0.1.0
 */

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Alanjoose\Dbsocket\Entities\ConnectorRouter;

final class ConnectorTest extends TestCase
{
    /**
     * Check if connector instance is not null.
     * @return void
     */
    public function testConnectorCanBeInstantiated(): void
    {
        $this->assertNotNull(ConnectorRouter::getConnectorInstance());
    }

    /**
     * Check if connector is instantiated via router.
     * @return void
     */
    public function testConnectorCanConnectViaRouter(): void
    {
        $this->assertInstanceOf(\PDO::class, ConnectorRouter::getConnection());
    }

    /**
     * Check if connector is instantiated by single instance.
     * @return void
     */
    public function testConnectorCanConnectViaInstance(): void
    {
        $this->assertInstanceOf(\PDO::class, ConnectorRouter::getConnectorInstance()->connect());
    }
}
