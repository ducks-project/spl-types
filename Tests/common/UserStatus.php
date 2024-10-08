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

use Ducks\Component\SplTypes\SplEnumBacked as DuckEnumBacked;

/**
 * @extends DuckEnumBacked<string>
 *
 * @method static UserStatus PENDING()
 * @method static UserStatus ACTIVE()
 * @method static UserStatus SUSPENDED()
 * @method static UserStatus CANCELEDBYUSER()
 */
class UserStatus extends DuckEnumBacked
{
    public const PENDING = 'P';
    public const ACTIVE = 'A';
    public const SUSPENDED = 'S';
    public const CANCELEDBYUSER = 'C';
}
