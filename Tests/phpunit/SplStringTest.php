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

use Ducks\Component\SplTypes\SplString as DuckString;
use PHPUnit\Framework\TestCase;

class SplStringTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new DuckString();
        $this->assertSame('', $instance());

        $instance = new DuckString('hello world');
        $this->assertSame('hello world', $instance());
    }

    /**
     * Unit test.
     *
     * @return void
     *
     * @psalm-suppress UnsupportedReferenceUsage
     */
    public function testConcatenate(): void
    {
        $instance = new DuckString('hello ');

        $value = &$instance();
        $value .= 'world';

        $this->assertSame('hello world', $value);
        $this->assertSame('hello world', $instance());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testStringCast(): void
    {
        $instance = new DuckString('hello world');
        $this->assertSame('hello world', (string) $instance);
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testSerialization(): void
    {
        $instance = new DuckString('hello world');
        $serialized = \serialize($instance);
        $unserialized = \unserialize($serialized);

        $this->assertEquals($instance, $unserialized);
        $this->assertSame('hello world', $instance());
    }
}
