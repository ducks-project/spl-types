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

namespace Ducks\Component\SplTypes\Reflection;

/**
 * The ReflectionEnum class reports information about an Enum.
 *
 * @link https://php.net/manual/en/class.reflectionenum.php
 */
final class SplReflectionEnumHelper
{
    private static ?\ReflectionNamedType $rnts = null;
    private static ?\ReflectionNamedType $rnti = null;

    private function __construct()
    {
    }

    /**
     * Only way to generate a string ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getStringReflectionNamedType(): \ReflectionNamedType
    {
        if (null === static::$rnts) {
            $func = new \ReflectionFunction(static fn (string $param): string => $param);
            // @phpstan-ignore-next-line
            static::$rnts = ($func->getParameters()[0])->getType();
        }

        // @phpstan-ignore-next-line
        return static::$rnts;
    }

    /**
     * Only way to generate an int ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getIntReflectionNamedType(): \ReflectionNamedType
    {
        if (null === static::$rnti) {
            $func = new \ReflectionFunction(static fn (int $param): int => $param);
            // @phpstan-ignore-next-line
            static::$rnti = ($func->getParameters()[0])->getType();
        }

        // @phpstan-ignore-next-line
        return static::$rnti;
    }
}
