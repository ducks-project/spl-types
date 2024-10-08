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
 * Parent class for all SPL types.
 *
 * @template T
 *
 * @psalm-api
 */
abstract class SplType implements
    \JsonSerializable,
    \Stringable
{
    /** @use SplTypeTrait<T> */
    use SplTypeTrait;

    /**
     * Default value.
     *
     * @var mixed
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    protected const __default = null;

    /**
     * Creates a new value of some type.
     *
     * @param mixed $initial_value Type and default value depends on the extension class.
     * @param bool $strict Whether to set the object's sctrictness.
     *
     * @return void
     *
     * @phpstan-param T|null $initial_value Type and default value depends on the extension class.
     * @phpstan-param bool $strict Whether to set the object's sctrictness.
     * @phpstan-ignore-next-line
     *
     * @psalm-suppress PossiblyUnusedParam
     *
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function __construct($initial_value = self::__default, /** @scrutinizer ignore-unused */ bool $strict = true)
    {
        /** @var T $this->__default */
        $this->__default = $initial_value ?? static::__default;
    }
}
