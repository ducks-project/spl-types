<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes;

/**
 * Trait used for enum emulation
 *
 * @psalm-api
 */
trait SplEnumTrait
{
    /**
     * Return a new instance of enum
     *
     * @param string $name
     * @param array $arguments
     *
     * @return static
     *
     * @psalm-suppress UnsafeInstantiation
     * @phpstan-ignore-next-line
     */
    #[\ReturnTypeWillChange]
    public static function __callStatic(string $name, array $arguments)
    {
        try {
            $class = new \ReflectionClassConstant(static::class, $name);
        } catch (\ReflectionException $th) {
            throw new \Error('Undefined constant ' . static::class . '::' . $name);
        }

        // @phpstan-ignore-next-line
        return new static($class->getValue());
    }
}
