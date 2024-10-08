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
 * @phpstan-require-extends SplEnum
 * @phpstan-require-implements SplEnumSingletonable
 *
 * @psalm-api
 */
trait SplEnumSingletonTrait
{
    /**
     * internal instance of enum
     *
     * @var SplEnumSingletonable[]
     *
     * @phpstan-var array<string,SplEnumSingletonable>
     */
    private static array $instances = [];

    /**
     * Return the singleton enum instance.
     *
     * @param string $name
     *
     * @return SplEnumSingletonable
     *
     * @throws \Error if $name is not a case
     *
     * @see SplEnum::__callStatic()
     */
    public static function getInstance(string $name): SplEnumSingletonable
    {
        if (!isset(self::$instances[$name])) {
            /** @var SplEnumSingletonable $instance */
            $instance = static::$name();
            self::$instances[$name] = $instance;
        }

        return self::$instances[$name];
    }
}
