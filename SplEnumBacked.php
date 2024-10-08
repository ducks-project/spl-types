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
 * @property mixed $value
 *
 * @template T
 * @extends SplEnumUnit<T>
 * @implements SplBackedEnum<T>
 *
 * @psalm-api
 */
#[\AllowDynamicProperties]
abstract class SplEnumBacked extends SplEnumUnit implements SplBackedEnum
{
    /** @use SplBackedEnumTrait<T> */
    use SplBackedEnumTrait;
    /** @use SplEnumBackedTrait<T> */
    use SplEnumBackedTrait;

    /**
     * {@inheritdoc}
     *
     * @psalm-suppress UnsupportedPropertyReferenceUsage
     */
    protected function __construct()
    {
        // Value can be undeclare because typed definition can change.
        $this->value = &$this->__default;
    }
}
