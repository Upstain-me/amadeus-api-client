<?php

namespace Upstain\AmadeusApiClient\Tests\Unit;

use Codeception\Test\Unit;
use Upstain\AmadeusApiClient\Initial;

class InitialTest extends Unit
{
    public function testTest(): void
    {
        $obj = new Initial();

        $this->assertEquals(1, $obj->test());
    }
}
