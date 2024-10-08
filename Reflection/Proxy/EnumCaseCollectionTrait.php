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

use Ducks\Component\SplTypes\Reflection\SplReflectionEnumBackedCase;
use Ducks\Component\SplTypes\Reflection\SplReflectionEnumUnitCase;
use Ducks\Component\SplTypes\SplEnumerable;

/**
 * Used in order to manage constant class as enum case.
 */
trait EnumCaseCollectionTrait
{
    /**
     * Array of Reflection enum cases, indexed by name.
     *
     * @var (SplReflectionEnumUnitCase|SplReflectionEnumBackedCase)[]
     *
     * @phpstan-var array<string, SplReflectionEnumUnitCase|SplReflectionEnumBackedCase>
     */
    private array $cases = [];

    /**
     * The nameof the case beeing instanciate
     *
     * @var string|null
     */
    private ?string $running = null;

    /**
     * Name of the class constant.
     *
     * @return string
     */
    abstract public function getName(): string;

    /**
     * Return an array of class constants, indexed by name, that could be use as an enum case.
     *
     * @return \ReflectionClassConstant[]
     *
     * @phpstan-return array<string,\ReflectionClassConstant>
     *
     * @see ConstantCaseCollectionTrait::getConstantCases()
     */
    abstract public function getConstantCases(): array;

    /**
     * Checks for a constant case on an Enum
     *
     * @param string $name The case to check for.
     *
     * @return boolean
     *
     * @see ConstantCaseCollectionTrait::hasConstantCase()
     */
    abstract public function hasConstantCase(string $name): bool;

    /**
     * Determines if an Enum is a Backed Enum
     *
     * @return boolean
     *
     * @see SplReflectionEnumProxy::isBacked()
     */
    abstract public function isBacked(): bool;

    /**
     * Gets the backing type of an Enum, if any
     *
     * @return \ReflectionNamedType|null An instance of ReflectionNamedType, or null if the Enum has no backing type.
     *
     * @see SplReflectionEnumProxy::getBackingType()
     */
    abstract public function getBackingType(): ?\ReflectionNamedType;

    /**
     * Init internal cases array.
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    private function initCases(): void
    {
        $cases = \array_diff_key($this->getConstantCases(), $this->cases);
        $this->addCase(...\array_values($cases));
    }

    /**
     * Add a case to internal array
     *
     * @param \ReflectionClassConstant ...$constants
     *
     * @return void
     */
    public function addCase(\ReflectionClassConstant ...$constants): void
    {
        $className = $this->getName();

        foreach ($constants as $constant) {
            $name = $constant->getName();
            if (
                !isset($this->cases[$name])
                && \is_a($className, SplEnumerable::class, true)
            ) {
                // Check type
                $value = $constant->getValue();

                // Mandatory in order to prevent infinite loop
                $this->running = $name;

                if (!$this->isBacked() && null === $value) {
                    $this->cases[$name] = new SplReflectionEnumUnitCase($className, $name);
                    unset($this->running);
                    continue;
                }

                $backingType = $this->getBackingType();

                if (
                    $this->isBacked()
                    && $backingType instanceof \ReflectionNamedType
                    && $backingType->getName() === \gettype($value)
                ) {
                    $this->cases[$name] = new SplReflectionEnumBackedCase($className, $name);
                    unset($this->running);
                    continue;
                }
            }
        }
    }

    /**
     * Returns a list of all cases on an Enum
     *
     * @return (SplReflectionEnumUnitCase|SplReflectionEnumBackedCase)[]
     *
     * @phpstan-return array<string,SplReflectionEnumUnitCase|SplReflectionEnumBackedCase>
     *
     * @link https://www.php.net/manual/en/reflectionenum.getcases.php
     */
    public function getCases(): array
    {
        static $init = false;

        if (!$init) {
            $this->initCases();
            $init = true;
        }

        return $this->cases;
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
        if (!$this->hasCase($name)) {
            throw new \ReflectionException($this->getName() . '::' . $name . ' is not a case');
        }

        return $this->cases[$name];
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
        // $this->cases could be empty
        if (isset($this->cases[$name]) || $this->running === $name) {
            return true;
        }

        if ($this->hasConstantCase($name)) {
            $constant = $this->getConstantCase($name);
            $this->addCase($constant);
        }

        return isset($this->cases[$name]);
    }
}
