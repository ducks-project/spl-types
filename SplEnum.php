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
 * SplEnum gives the ability to emulate and create enumeration objects natively in PHP.
 *
 * @template T
 * @extends SplType<T>
 *
 * @psalm-api
 *
 * @psalm-suppress MissingDependency
 * @psalm-suppress UndefinedClass
 */
abstract class SplEnum extends SplType implements SplEnumerable
{
    use SplEnumTrait;
    /** @use SplEnumAccessorsTrait<T> */
    use SplEnumAccessorsTrait;

    /**
     * {@inheritdoc}
     *
     * @param mixed $initial_value
     * @param bool $strict
     *
     * @phpstan-param T|null $initial_value
     * @phpstan-param bool $strict
     *
     * @throws \UnexpectedValueException if incompatible type is given.
     *
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function __construct($initial_value = self::__default, bool $strict = true)
    {
        /** @var T $initial_value */
        $initial_value ??= static::__default;

        if (!\in_array($initial_value, $this->getConstList(), $strict)) {
            throw new \UnexpectedValueException('Cannot instantiate, Value not a const in enum ' . __CLASS__);
        }

        parent::__construct($initial_value);
    }

    /**
     * Returns all consts (possible values) as an array.
     *
     * @param bool $include_default Whether to include __default property.
     *
     * @return mixed[]
     *
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    final public function getConstList(bool $include_default = false)
    {
        $class = new \ReflectionClass($this);
        $constants = $class->getConstants();
        if (!$include_default) {
            unset($constants['__default']);
        }

        return $constants;
    }
}
