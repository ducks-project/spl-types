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
 * The SplFloat class is used to enforce strong typing of the float type.
 */
class SplFloat extends SplType
{
    /**
     * @var float
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    public const __default = 0.0;

    /**
     * {@inheritdoc}
     *
     * @param float $initial_value
     */
    public function __construct(float $initial_value = self::__default)
    {
        parent::__construct($initial_value);
    }
}
