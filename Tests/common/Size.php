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

use Ducks\Component\SplTypes\SplIntEnum as DuckIntEnum;

/**
 * @method static Size SMALL()
 * @method static Size MEDIUM()
 * @method static Size LARGE()
 */
class Size extends DuckIntEnum
{
    public const SMALL = 0;
    public const MEDIUM = 1;
    public const LARGE = 2;
}
