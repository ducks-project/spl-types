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

namespace Ducks\Component\SplTypes\Util;

use Ducks\Component\SplTypes\SplEnum;

final class Tools
{
    private function __construct()
    {
    }

    /**
     * Checks if the spl enum has been defined
     *
     * @param string $class Checks if the enum has been defined
     * @param boolean $autoload Whether to autoload if not already loaded.
     *
     * @return boolean Returns true if enum is a defined enum, false otherwise.
     */
    public static function isSplEnumExists(string $class, bool $autoload = true): bool
    {
        return \class_exists($class, $autoload)
            && \is_a($class, SplEnum::class, true);
    }
}
