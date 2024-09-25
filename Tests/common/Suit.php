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

use Ducks\Component\SplTypes\SplEnum as DuckEnum;

/**
 * @method static Suit Hearts()
 * @method static Suit Diamonds()
 * @method static Suit Clubs()
 * @method static Suit Spades()
 */
class Suit extends DuckEnum
{
    public const HEARTS = 'H';
    public const DIAMONDS = 'D';
    public const CLUBS = 'C';
    public const SPADES = 'S';
}
