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

namespace Ducks\Component\SplTypes\Reflection;

use Ducks\Component\SplTypes\SplUnitEnum;

/**
 * The ReflectionEnum class reports information about an Enum.
 *
 * @template T of SplUnitEnum
 * @extends \ReflectionClass<\Ducks\Component\SplTypes\SplUnitEnum>
 *
 * @link https://php.net/manual/en/class.reflectionenum.php
 */
class SplReflectionEnum extends \ReflectionClass
{
    /**
     * Array of proxy
     *
     * @var array<int, SplReflectionEnumProxy>
     */
    private static array $instances = [];

    /**
     * Return the ReflectionEnumProxy for class parsing
     *
     * @return SplReflectionEnumProxy
     *
     * @codeCoverageIgnore
     */
    private function getProxy(): SplReflectionEnumProxy
    {
        if (!isset(self::$instances[$this->name])) {
            self::$instances[$this->name] = new SplReflectionEnumProxy($this);
        }

        return self::$instances[$this->name];
    }

    /**
     * Instantiates a ReflectionEnum object
     *
     * @param object|string $objectOrClass
     *
     * @throws \ReflectionException if objectOrClass is not a SplUnitEnum
     *
     * @phpstan-param SplUnitEnum|class-string<T> $objectOrClass
     *
     * @link https://www.php.net/manual/en/reflectionenum.construct.php
     */
    public function __construct($objectOrClass)
    {
        // Fast check
        if (!\is_a($objectOrClass, SplUnitEnum::class, true)) {
            // @phpstan-ignore ternary.elseUnreachable
            $classname = \is_object($objectOrClass) ? \get_class($objectOrClass) : $objectOrClass;
            throw new \ReflectionException("Class \"$classname\" is not an enum");
        }

        parent::__construct($objectOrClass);
    }

    /**
     * Gets the backing type of an Enum, if any
     *
     * @return \ReflectionNamedType|null An instance of ReflectionNamedType, or null if the Enum has no backing type.
     *
     * @link https://www.php.net/manual/en/reflectionenum.getbackingtype.php
     */
    public function getBackingType(): ?\ReflectionNamedType
    {
        return $this->getProxy()->getBackingType();
    }

    /**
     * Returns a specific case of an Enum
     *
     * @param string $name
     *
     * @return SplReflectionEnumUnitCase|SplReflectionEnumBackedCase
     *
     * @throws \ReflectionException If the requested case is not defined
     *
     * @link https://www.php.net/manual/en/reflectionenum.getcase.php
     */
    public function getCase(string $name): SplReflectionEnumUnitCase
    {
        return $this->getProxy()->getCase($name);
    }

    /**
     * Returns a list of all cases on an Enum
     *
     * @return array<int, SplReflectionEnumUnitCase|SplReflectionEnumBackedCase>
     *
     * @phpstan-return list<SplReflectionEnumUnitCase|SplReflectionEnumBackedCase>
     *
     * @link https://www.php.net/manual/en/reflectionenum.getcases.php
     */
    public function getCases(): array
    {
        return \array_values($this->getProxy()->getCases());
    }

    /**
     * Checks for a case on an Enum
     *
     * @param string $name The case to check for.
     *
     * @return boolean
     *
     * @link https://www.php.net/manual/en/reflectionenum.hascase.php
     */
    public function hasCase(string $name): bool
    {
        return $this->getProxy()->hasCase($name);
    }

    /**
     * Determines if an Enum is a Backed Enum
     *
     * @return boolean
     */
    public function isBacked(): bool
    {
        return $this->getProxy()->isBacked();
    }
}
