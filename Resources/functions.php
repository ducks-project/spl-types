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

/** @disregard P1009 Undefined type */
if (!\function_exists(spl_enum_exists::class)) {
    /**
     * Checks if the spl enum has been defined
     *
     * @param string $enum Checks if the enum has been defined
     * @param boolean $autoload Whether to autoload if not already loaded.
     *
     * @return boolean Returns true if enum is a defined enum, false otherwise.
     */
    function spl_enum_exists(string $class, bool $autoload = true): bool
    {
        return Util\Tools::isSplEnumExists($class, $autoload);
    }
}
