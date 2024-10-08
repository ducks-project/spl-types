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

namespace Ducks\Component\SplTypes\Tests\common;

use Ducks\Component\SplTypes\SplStringEnum as DuckStringEnum;

/**
 * @method static Suit HEARTS()
 * @method static Suit DIAMONDS()
 * @method static Suit CLUBS()
 * @method static Suit SPADES()
 */
class Suit extends DuckStringEnum
{
    public const HEARTS = 'H';
    public const DIAMONDS = 'D';
    public const CLUBS = 'C';
    public const SPADES = 'S';
}
