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
 * The SplInt class is used to enforce strong typing of the integer type.
 *
 * @see SplInt http://php.net/manual/en/class.splint.php
 *
 * @psalm-api
 */
class SplInt extends SplType
{
    /**
     * @var int
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    public const __default = 0;

    /**
     * {@inheritdoc}
     */
    public function __construct($initial_value = self::__default, bool $strict = true)
    {
        parent::__construct($initial_value, $strict);
        if (!$strict) {
            $initial_value = (int) $initial_value;
        }
        if (!is_int($initial_value)) {
            throw new \UnexpectedValueException('Value not an integer');
        }
        $this->__default = $initial_value;
    }
}
