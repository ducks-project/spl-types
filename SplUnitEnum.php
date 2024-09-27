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
 * Interface used in order to implements \UnitEnum one.
 *
 * @psalm-api
 */
interface SplUnitEnum
{
    // public readonly string $name;

    /**
     * Generates a list of cases on an enum
     *
     * @return static[] An array of all defined cases of this enumeration, in order of declaration.
     */
    public static function cases(): array;
}
