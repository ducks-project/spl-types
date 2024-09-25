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
 * @psalm-api
 */
abstract class SplEnum extends SplType
{
    use SplEnumTrait;

    /**
     * {@inheritdoc}
     *
     * @param mixed $initial_value
     * @param bool $strict
     *
     * @throws \UnexpectedValueException if incompatible type is given.
     *
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function __construct($initial_value = self::__default, bool $strict = true)
    {
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
     * @return array<mixed, mixed>
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

    /**
     * Return the case-sensitive name of the case class itself
     *
     * @param string $name
     *
     * @return mixed
     */
    final public function __get(string $name)
    {
        switch ($name) {
            case 'name':
                $result = \array_search($this->__default, $this->getConstList());
                break;

            case 'value':
                $result = $this->__default;
                break;

            default:
                \trigger_error('Undefined property: ' . static::class . '::$' . $name, E_USER_WARNING);
                break;
        }

        return $result ?? null;
    }

    /**
     * Writing data to inaccessible (protected or private) or non-existing properties.
     *
     * @psalm-suppress MissingParamType
     * @phpstan-ignore-next-line
     */
    final public function __set(string $name, $value): void
    {
        // Fast return
        if ('name' === $name || 'value' === $name) {
            \trigger_error('Cannot modify readonly property ' . static::class . '::$' . $name, E_USER_ERROR);
        }

        \trigger_error('Cannot create dynamic property ' . static::class . '::$' . $name, E_USER_ERROR);
    }

    final public function __isset(string $name): bool
    {
        switch ($name) {
            case 'name':
            case 'value':
                $result = true;
                break;

            default:
                $result = isset($this->$name);
                break;
        }

        return $result;
    }

    final public function __unset(string $name): void
    {
        // Fast return
        if ('name' !== $name) {
            return;
        }

        \trigger_error('Cannot unset readonly property ' . static::class . '::$' . $name, E_USER_ERROR);
    }

    /**
     * Return a new instance of enum
     *
     * @param string $name
     * @param array $arguments
     *
     * @return SplEnum
     *
     * @psalm-suppress UnsafeInstantiation
     * @phpstan-ignore-next-line
     */
    final public static function __callStatic(string $name, array $arguments): self
    {
        try {
            $class = new \ReflectionClassConstant(static::class, $name);
        } catch (\ReflectionException $th) {
            throw new \Error('Undefined constant ' . static::class . '::' . $name);
        }

        // @phpstan-ignore-next-line
        return new static($class->getValue());
    }
}
