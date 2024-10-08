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
use Ducks\Component\SplTypes\SplUnitEnum;

final class SplReflectionEnumProxy
{
    use Proxy\ConstantCaseCollectionTrait;
    use Proxy\EnumCaseCollectionTrait;

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
     * Name of the class constant.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
