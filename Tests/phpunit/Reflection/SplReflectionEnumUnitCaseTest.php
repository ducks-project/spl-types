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

namespace Ducks\Component\SplTypes\Tests\phpunit\Reflection;

use Ducks\Component\SplTypes\Reflection\SplReflectionEnum;
use Ducks\Component\SplTypes\Reflection\SplReflectionEnumUnitCase;
use Ducks\Component\SplTypes\Tests\common\Foo;
use Ducks\Component\SplTypes\Tests\common\Month;
use Ducks\Component\SplTypes\Tests\common\SortOrder;
use Ducks\Component\SplTypes\Tests\common\Suit;
use PHPUnit\Framework\TestCase;

class SplReflectionEnumUnitCaseTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     */
    public function test(): void
    {
        $instance = new SplReflectionEnumUnitCase(Suit::class, 'HEARTS');
        $this->assertInstanceOf(SplReflectionEnum::class, $instance->getEnum());
        $this->assertEquals(Suit::HEARTS(), $instance->getValue());
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testEnumerableException(): void
    {
        $this->expectException(\ReflectionException::class);
        $this->expectExceptionMessage('Class "Ducks\Component\SplTypes\Tests\common\Foo" is not an enum');
        // @phpstan-ignore argument.type
        new SplReflectionEnumUnitCase(Foo::class, 'ASC');
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testConstantException(): void
    {
        $this->expectException(\ReflectionException::class);
        $this->expectExceptionMessage('Class Constant ReflectionException::ASC does not exist');
        // @phpstan-ignore argument.type
        new SplReflectionEnumUnitCase(\ReflectionException::class, 'ASC');
    }

    /**
     * Unit test.
     *
     * @return void
     */
    public function testCaseException(): void
    {
        $this->expectException(\ReflectionException::class);
        $this->expectExceptionMessage('Enum case Ducks\Component\SplTypes\Tests\common\SortOrder::FOO is not a case');
        // @phpstan-ignore argument.type
        new SplReflectionEnumUnitCase(SortOrder::class, 'FOO');
    }
}
