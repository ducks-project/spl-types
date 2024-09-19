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

use Ducks\Component\SplTypes\SplFloat as DuckFloat;
use PHPUnit\Framework\TestCase;

class SplFloatTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new DuckFloat();
        $this->assertSame(0.0, $instance());

        $instance = new DuckFloat(10.1);
        $this->assertSame(10.1, $instance());
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
        $instance = new DuckFloat(10.1);

        $value = &$instance();
        $value++;

        $this->assertSame(11.1, $value);
        $this->assertSame(11.1, $instance());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testSerialization(): void
    {
        $instance = new DuckFloat(22.9);
        $serialized = \serialize($instance);
        $unserialized = \unserialize($serialized);

        $this->assertEquals($instance, $unserialized);
        $this->assertEquals(22.9, $instance());
    }
}
