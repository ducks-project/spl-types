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
 * Parent class for all SPL types.
 *
 * @see SplType http://php.net/manual/en/class.spltype.php
 *
 * @psalm-api
 */
abstract class SplType
{
    /**
     * Default value.
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    public const __default = null;

    /**
     * Internal enum value.
     *
     * @var mixed
     */
    // phpcs:ignore PSR2.Classes.PropertyDeclaration.Underscore
    public $__default;

    /**
     * Creates a new value of some type.
     *
     * @param mixed $initial_value Type and default value depends on the extension class.
     * @param bool $strict Whether to set the object's sctrictness.
     *
     * @return void
     *
     * @throws \UnexpectedValueException if incompatible type is given.
     *
     * @phpstan-ignore-next-line
     */
    public function __construct($initial_value = self::__default, bool $strict = true)
    {
        if (null === $initial_value) {
            $initial_value = static::__default;
        }
        $this->__default = $initial_value;
    }

    /**
     * Stringify object.
     *
     * @return string
     */
    final public function __toString()
    {
        return (string) $this->__default;
    }

    /**
     * Export object.
     *
     * @param array<mixed, mixed> $properties
     *
     * @return SplType
     */
    final public static function __set_state(array $properties)
    {
        // @phpstan-ignore-next-line
        return new static($properties['__default']);
    }

    /**
     * Dumping object (php > 5.6.0).
     *
     * @return array<mixed, mixed>
     */
    final public function __debugInfo()
    {
        return [
            '__default' => $this->__default,
        ];
    }
}
