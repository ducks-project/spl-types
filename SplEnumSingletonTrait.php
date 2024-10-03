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
    /**
     * Undocumented variable
     *
     * @var array<int,SplEnumSingletonable>
     *
     * @phpstan-var list<SplEnumSingletonable>
     */
    private static array $instances = [];

    /**
     * Return the singleton enum instance.
     *
     * @param string $name
     *
     * @return SplEnumSingletonable
     */
    public static function getInstance(string $name): SplEnumSingletonable
    {
        if (!isset(self::$instances[$name])) {
            self::$instances[$name] = static::$name();
        }

        return self::$instances[$name];
    }
}
