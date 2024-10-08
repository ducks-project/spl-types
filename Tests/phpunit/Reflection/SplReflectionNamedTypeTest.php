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

use Ducks\Component\SplTypes\Reflection\SplReflectionNamedType;
use PHPUnit\Framework\TestCase;

class SplReflectionNamedTypeTest extends TestCase
{
    /**
     * Unit test mixed.
     *
     * @return void
     */
    public function testMixed(): void
    {
        $name = 'mixed';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(true, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test null.
     *
     * @return void
     */
    public function testNull(): void
    {
        $name = 'null';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(true, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test not nullable.
     *
     * @return void
     */
    public function testNullable(): void
    {
        $name = 'int';
        $type = new SplReflectionNamedType($name, true);

        $this->assertSame($name, $type->getName());
        $this->assertSame(true, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test int.
     *
     * @return void
     */
    public function testInt(): void
    {
        $name = 'int';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test float.
     *
     * @return void
     */
    public function testFloat(): void
    {
        $name = 'float';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test string.
     *
     * @return void
     */
    public function testString(): void
    {
        $name = 'string';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test bool.
     *
     * @return void
     */
    public function testBool(): void
    {
        $name = 'bool';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test array.
     *
     * @return void
     */
    public function testArray(): void
    {
        $name = 'array';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test int.
     *
     * @return void
     */
    public function testFalse(): void
    {
        $name = 'false';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test int.
     *
     * @return void
     */
    public function testObject(): void
    {
        $name = 'object';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(true, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }

    /**
     * Unit test user class.
     *
     * @return void
     */
    public function testUserClass(): void
    {
        $name = '\stdClass';
        $type = new SplReflectionNamedType($name);

        $this->assertSame($name, $type->getName());
        $this->assertSame(false, $type->allowsNull());
        $this->assertSame(false, $type->isBuiltin());
        $this->assertSame($name, (string) $type);
    }
}
