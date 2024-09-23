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

namespace Ducks\Component\SplTypes\Tests\phpunit;

use Ducks\Component\SplTypes\SplBool as DuckBool;
use PHPUnit\Framework\TestCase;

class SplBoolTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new DuckBool();
        $this->assertFalse($instance());

        $instance = new DuckBool(true);
        $this->assertTrue($instance());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testGetConstList(): void
    {
        $list = [
            '__default' => false,
            'false' => false,
            'true' => true,
        ];
        $instance = new DuckBool();

        $test = $instance->getConstList(true);
        $this->assertSame($list, $test);

        $test = $instance->getConstList();
        unset($list['__default']);
        $this->assertSame($list, $test);
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testSerialization(): void
    {
        $instance = new DuckBool();
        $serialized = \serialize($instance);
        $unserialized = \unserialize($serialized);

        $this->assertEquals($instance, $unserialized);
        $this->assertFalse($instance());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testJsonSerialization(): void
    {
        $instance = new DuckBool();
        $json = \json_encode($instance);

        $this->assertEquals("false", $json);
    }
}
