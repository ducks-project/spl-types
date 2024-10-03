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

use Ducks\Component\SplTypes\SplEnumUnit as DuckSplPureEnum;

/**
 * SplEnumUnit alias.
 *
 * <code>
 * \class_alias(DuckSplPureEnum::class, '\\SplPureEnum', true);
 * </code>
 *
 * @template T
 * @extends Ducks\Component\SplTypes\SplEnumUnit<T>
 */
// phpcs:ignore PSR1.Classes.ClassDeclaration.MissingNamespace
class SplPureEnum extends DuckSplPureEnum
{
}
