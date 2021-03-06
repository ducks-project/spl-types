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
 */
class SplString extends SplType
{
    /**
     * @var string
     *
     * @codingStandardsIgnoreStart
     */
    const __default = '';
    // @codingStandardsIgnoreEnd

    /**
     * {@inheritdoc}
     */
    public function __construct($initial_value = self::__default, $strict = true)
    {
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
