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
 * SplEnumBacked gives the ability to emulate and create backed enumeration objects natively in PHP.
 *
 * @template T
 * @extends SplEnum<T>
 *
 * @psalm-api
 */
abstract class SplEnumUnit extends SplEnum implements
    SplEnumSingletonable,
    SplUnitEnum
{
    use SplUnitEnumTrait;
    use SplEnumUnitTrait;

    /**
     * {@inheritdoc}
     */
    protected function __construct()
    {
    }
}
