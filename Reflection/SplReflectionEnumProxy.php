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

use Ducks\Component\SplTypes\SplBackedEnum;
use Ducks\Component\SplTypes\SplEnumerable;
use Ducks\Component\SplTypes\SplUnitEnum;

final class SplReflectionEnumProxy
{
    /**
     * The reflection class used in proxy
     *
     * @var \ReflectionClass
     *
     * @phpstan-var \ReflectionClass<object>
     */
    private \ReflectionClass $class;

    /**
     * Is enum is backed
     *
     * @var boolean|null
     */
    private ?bool $backed = null;

    /**
     * Will be used to set backingType.
     *
     * @var \ReflectionNamedType|null|false
     */
    private $backingType = null;

    /**
     * Array of constants class, indexed by name, as enum cases.
     *
     * @var \ReflectionClassConstant[]
     *
     * @phpstan-var array<string,\ReflectionClassConstant>
     */
    private array $constantCases = [];

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
     * @var string
     *
     * @readonly
     *
     * @phpstan-var class-string
     *
     * @psalm-readonly
     *
     * @phan-read-only
     */
    public string $name;

    /**
     * Build a proxy SplReflectionEnum from a ReflectionClass
     *
     * @param \ReflectionClass<object> $class
     */
    public function __construct(\ReflectionClass $class)
    {
        $this->class = $class;
        $this->name = $class->getName();
    }

    /**
     * Gets constants.
     *
     * @return mixed[] An array of constants,
     * where the keys hold the name and the values the value of the constants.
     *
     * @phpstan-return array<string, mixed>
     */
    public function getConstants(): array
    {
        return $this->class->getConstants();
    }

    /**
     * Gets a ReflectionClassConstant for a class's property
     *
     * @param string $name The class constant name.
     *
     * @return \ReflectionClassConstant|null
     */
    public function getReflectionConstant(string $name): ?\ReflectionClassConstant
    {
        return $this->class->getReflectionConstant($name) ?: null;
    }

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
        foreach ($constants as $constant) {
            $name = $constant->getName();
            if (
                !isset($this->constantCases[$name])
                && $constant->isPublic()
                // Check consistency because of polyfilling or other bad overrides
                && $constant->getDeclaringClass()->getName() === $this->name
                // Do not use isBacked method because of infinite loop possibility
                // Add if not BackedEnum or Backed but valid type
                && (
                    !\is_a($this->name, SplBackedEnum::class, true)
                    || (
                        \is_a($this->name, SplBackedEnum::class, true)
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
            throw new \ReflectionException($this->name . '::' . $name . ' is not a constant case');
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
        foreach ($constants as $constant) {
            $name = $constant->getName();
            if (
                !isset($this->cases[$name])
                && \is_a($this->name, SplEnumerable::class, true)
            ) {
                // Check type
                $value = $constant->getValue();

                // Mandatory in order to prevent infinite loop
                $this->running = $name;

                if (!$this->isBacked() && null === $value) {
                    $this->cases[$name] = new SplReflectionEnumUnitCase($this->name, $name);
                    unset($this->running);
                    continue;
                }

                $backingType = $this->getBackingType();

                if (
                    $this->isBacked()
                    && $backingType instanceof \ReflectionNamedType
                    && $backingType->getName() === \gettype($value)
                ) {
                    $this->cases[$name] = new SplReflectionEnumBackedCase($this->name, $name);
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
            throw new \ReflectionException($this->name . '::' . $name . ' is not a case');
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

    /**
     * Determines if an Enum is a Backed Enum
     *
     * @return boolean
     */
    public function isBacked(): bool
    {
        if (null === $this->backed) {
            if (\is_a($this->name, SplBackedEnum::class, true)) {
                $this->backed = true;
            } elseif (\is_a($this->name, SplUnitEnum::class, true)) {
                $this->backed = false;
            } else {
                $constant = $this->getFirstCaseConstant();
                $this->backed = $constant instanceof \ReflectionClassConstant && null !== $constant->getValue();
            }
        }

        return $this->backed;
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
        if (null === $this->backingType) {
            if ($this->isBacked()) {
                if ($this->class->hasProperty('value')) {
                    /** @var \ReflectionNamedType|false $type */
                    $type = $this->class->getProperty('value')->getType() ?? false;
                    $this->backingType = $type;
                } else {
                    $constant = $this->getFirstCaseConstant();
                    if ($constant instanceof \ReflectionClassConstant) {
                        $this->backingType = SplReflectionEnumHelper::getReflectionNamedTypeFromType(
                            \gettype($constant->getValue())
                        );
                    }
                }
            } else {
                $this->backingType = false;
            }
        }

        return $this->backingType ?: null;
    }
}
