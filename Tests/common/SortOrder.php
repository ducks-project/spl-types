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

use Ducks\Component\SplTypes\SplEnumUnit as DuckEnumUnit;

/**
 * @extends DuckEnumUnit<null>
 *
 * @method static Size ASC()
 * @method static Size DESC()
 */
class SortOrder extends DuckEnumUnit
{
    public const ASC = null;
    public const DESC = null;

    public const FOO = 'foo';
}
