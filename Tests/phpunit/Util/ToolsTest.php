<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Ducks\Component\SplTypes\Tests\phpunit\Util;

use Ducks\Component\SplTypes\Tests\common\Month;
use Ducks\Component\SplTypes\Util\Tools;
use PHPUnit\Framework\TestCase;

class ToolsTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $this->assertTrue(Tools::isSplEnumExists(Month::class));
    }

    /**
     * Test bad instantiation of Tools Helper.
     *
     * @return void
     *
     * @covers \Ducks\Component\SplTypes\Util\Tools::__construct()
     */
    public function testNew(): void
    {
        $reflection = new \ReflectionClass(Tools::class);
        $constructor = $reflection->getConstructor();

        $this->assertInstanceOf(\ReflectionMethod::class, $constructor);
        $this->assertFalse($constructor->isPublic());
    }
}
