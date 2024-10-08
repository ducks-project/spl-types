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

namespace Ducks\Component\SplTypes;

/**
 * Interface used in order to implements \BackedEnum one.
 *
 * @template T
 *
 * @psalm-api
 */
interface SplBackedEnum extends SplUnitEnum
{
    // public readonly string|int|mixed $value;

    /**
     * Maps a scalar to an enum instance.
     *
     * @param int|string $value The scalar value to map to an enum case.
     *
     * @return static A case instance of this enumeration.
     *
     * @throws \ValueError if $value is not a valid backing value for enum
     */
    public static function from($value): self;

    /**
     * Maps a scalar to an enum instance or null.
     *
     * @param int|string|mixed $value e scalar value to map to an enum case.
     *
     * @return static|null A case instance of this enumeration, or null if not found.
     *
     * @psalm-suppress UnusedVariable
     */
    public static function tryFrom($value): ?self;
}
