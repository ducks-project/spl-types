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

use Ducks\Component\SplTypes\SplInt as DuckInt;
use PHPUnit\Framework\TestCase;

class SplIntTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new DuckInt();
        $this->assertSame(0, $instance());

        $instance = new DuckInt(10);
        $this->assertSame(10, $instance());
    }

    /**
     * Unit test.
     *
     * @return void
     *
     * @psalm-suppress UnsupportedReferenceUsage
     */
    public function testMath(): void
    {
        $instance = new DuckInt(10);

        $value = &$instance();
        $value++;

        $this->assertSame(11, $value);
        $this->assertSame(11, $instance());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testSerialization(): void
    {
        $instance = new DuckInt(22);
        $serialized = \serialize($instance);
        $unserialized = \unserialize($serialized);

        $this->assertEquals($instance, $unserialized);
        $this->assertEquals(22, $instance());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testJsonSerialization(): void
    {
        $instance = new DuckInt(22);
        $json = \json_encode($instance);

        $this->assertEquals("22", $json);
    }
}
