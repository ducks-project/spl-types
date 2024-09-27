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
trait SplEnumSingletonTrait
{
    private static array $instances = [];

    public static function getInstance(string $name): SplEnumSingletonable
    {
        if (!isset(self::$instances[$name])) {
            self::$instances[$name] = static::$name();
        }

        return self::$instances[$name];
    }
}
