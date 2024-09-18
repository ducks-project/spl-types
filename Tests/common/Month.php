<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

// phpcs:disable PSR12.Properties.ConstantVisibility.NotFound

namespace Ducks\Component\SplTypes\Tests\common;

use Ducks\Component\SplTypes\SplEnum;

class Month extends SplEnum
{
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    const __default = self::JANUARY;

    const JANUARY = 1;
    const FEBRUARY = 2;
    const MARCH = 3;
    const APRIL = 4;
    const MAY = 5;
    const JUNE = 6;
    const JULY = 7;
    const AUGUST = 8;
    const SEPTEMBER = 9;
    const OCTOBER = 10;
    const NOVEMBER = 11;
    const DECEMBER = 12;
}
