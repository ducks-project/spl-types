<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes;

/**
 * The SplFloat class is used to enforce strong typing of the float type.
 *
 * @see http://php.net/manual/en/class.splfloat.php
 *
 * @psalm-api
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
     */
    public function __construct($initial_value = self::__default, bool $strict = true)
    {
        parent::__construct($initial_value, $strict);
        if (!$strict) {
            $initial_value = (float) $initial_value;
        }
        if (!is_float($initial_value) && !is_int($initial_value)) {
            throw new \UnexpectedValueException('Value not a float');
        }
        $this->__default = $initial_value;
    }
}
