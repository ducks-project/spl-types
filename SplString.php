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
 * The SplString class is used to enforce strong typing of the string type.
 *
 * @see SplString http://php.net/manual/en/class.splstring.php
 *
 * @psalm-api
 */
class SplString extends SplType
{
    /**
     * @var string
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    public const __default = '';

    /**
     * {@inheritdoc}
     */
    public function __construct($initial_value = self::__default, bool $strict = true)
    {
        if (!$strict) {
            trigger_error(
                'Since 6.x argument $strict is deprecated for ' . __CLASS__
                    . ' and will be remove in 7.x in favor of strict typing.',
                \E_USER_DEPRECATED
            );
        }

        parent::__construct($initial_value, $strict);
        if (!$strict) {
            $initial_value = (string) $initial_value;
        }
        if (!is_string($initial_value)) {
            throw new \UnexpectedValueException('Value not a string');
        }
        $this->__default = $initial_value;
    }
}
