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
 * The SplBool class is used to enforce strong typing of the bool type.
 *
 * @extends SplEnum<bool>
 * @implements SplBackedEnum<bool>
 *
 * @property-read mixed $value
 * @property-read string $name
 *
 * @psalm-api
 * @psalm-suppress MissingDependency
 * @psalm-suppress UndefinedClass
 */
class SplBool extends SplEnum implements SplBackedEnum, SplEnumSingletonable
{
    /** @use SplBackedEnumTrait<bool> */
    use SplBackedEnumTrait;
    /** @use SplEnumBackedTrait<bool> */
    use SplEnumBackedTrait;

    /**
     * @var bool
     *
     * @psalm-suppress InvalidClassConstantType
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    protected const __default = self::false;

    /**
     * Value of enum instance
     *
     * @var bool
     */
    protected bool $value;

    /**
     * @var bool
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    public const false = false;

    /**
     * @var bool
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    public const true = true;

    /**
     * {@inheritdoc}
     *
     * @param bool $initial_value
     *
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function __construct(bool $initial_value = self::__default)
    {
        parent::__construct($initial_value);

        /** @psalm-suppress UnsupportedPropertyReferenceUsage */
        $this->value = &$this->__default;
        $this->name = $this->value ? 'true' : 'false';
    }

    final public function &__invoke(): bool
    {
        return $this->__default;
    }
}
