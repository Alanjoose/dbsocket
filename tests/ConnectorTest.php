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
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testConnectionIsMadeSuccessfully(): void
    {
        $this->assertInstanceOf(\PDO::class, ConnectorRouter::getConnector());
    }
}
