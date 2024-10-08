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

namespace Ducks\Component\SplTypes\Reflection\Proxy;

use Ducks\Component\SplTypes\SplBackedEnum;

/**
 * Used in order to manage constant class as enum case.
 */
trait ConstantCaseCollectionTrait
{
    /**
     * Array of constants class, indexed by name, as enum cases.
     *
     * @var \ReflectionClassConstant[]
     *
     * @phpstan-var array<string,\ReflectionClassConstant>
     */
    private array $constantCases = [];

    /**
     * Name of the class constant.
     *
     * @return string
     */
    abstract public function getName(): string;

    /**
     * Gets constants.
     *
     * @return mixed[] An array of constants,
     * where the keys hold the name and the values the value of the constants.
     *
     * @phpstan-return array<string, mixed>
     */
    abstract public function getConstants(): array;

    /**
     * Gets a ReflectionClassConstant for a class's property
     *
     * @param string $name The class constant name.
     *
     * @return \ReflectionClassConstant|null
     */
    abstract public function getReflectionConstant(string $name): ?\ReflectionClassConstant;

    /**
     * Init internal constant cases array.
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    private function initConstantCases(): void
    {
        $constants = \array_diff_key($this->getConstants(), $this->constantCases);
        foreach (\array_keys($constants) as $name) {
            $constant = $this->getReflectionConstant($name);
            if ($constant instanceof \ReflectionClassConstant) {
                $this->addConstantCase($constant);
            }
        }
    }

    /**
     * Add a constant case to internal array
     *
     * @param \ReflectionClassConstant ...$constants
     *
     * @return void
     *
     * @no-named-arguments
     */
    public function addConstantCase(\ReflectionClassConstant ...$constants): void
    {
        $className = $this->getName();

        foreach ($constants as $constant) {
            $name = $constant->getName();
            if (
                !isset($this->constantCases[$name])
                && $constant->isPublic()
                // Check consistency because of polyfilling or other bad overrides
                && $constant->getDeclaringClass()->getName() === $className
                // Do not use isBacked method because of infinite loop possibility
                // Add if not BackedEnum or Backed but valid type
                && (
                    !\is_a($className, SplBackedEnum::class, true)
                    || (
                        \is_a($className, SplBackedEnum::class, true)
                        && (\is_int($constant->getValue()) || \is_string($constant->getValue()))
                    )
                )
            ) {
                $this->constantCases[$name] = $constant;
            }
        }
    }

    /**
     * Return an array of class constants, indexed by name, that could be use as an enum case.
     *
     * @return \ReflectionClassConstant[]
     *
     * @phpstan-return array<string,\ReflectionClassConstant>
     */
    public function getConstantCases(): array
    {
        static $init = false;

        if (!$init) {
            $this->initConstantCases();
            $init = true;
        }

        return $this->constantCases;
    }

    /**
     * Return a class constant for a case name if exists
     *
     * @param string $name
     *
     * @return \ReflectionClassConstant
     *
     * @throws \ReflectionException If the requested constant case is not defined
     */
    public function getConstantCase(string $name): \ReflectionClassConstant
    {
        if (!$this->hasConstantCase($name)) {
            throw new \ReflectionException($this->getName() . '::' . $name . ' is not a constant case');
        }

        return $this->constantCases[$name];
    }

    /**
     * Checks for a constant case on an Enum
     *
     * @param string $name The case to check for.
     *
     * @return boolean
     */
    public function hasConstantCase(string $name): bool
    {
        if (isset($this->constantCases[$name])) {
            return true;
        }

        $constant = $this->getReflectionConstant($name);
        if ($constant instanceof \ReflectionClassConstant) {
            $this->addConstantCase($constant);
        }

        return isset($this->constantCases[$name]);
    }

    /**
     * Return the first defined constant as possible enum case.
     *
     * @return \ReflectionClassConstant|null
     */
    public function getFirstCaseConstant(): ?\ReflectionClassConstant
    {
        return \current($this->getConstantCases()) ?: null;
    }
}
