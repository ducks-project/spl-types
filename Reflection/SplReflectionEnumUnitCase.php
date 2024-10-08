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
 * The SplReflectionEnumUnitCase class reports information about an SplEnum unit case, which has no scalar equivalent.
 *
 * @property-read class-string<\Ducks\Component\SplTypes\SplEnumerable> $class
 *
 * @psalm-api
 * @psalm-immutable
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SplReflectionEnumUnitCase extends \ReflectionClassConstant
{
    /**
     * Internal instances enum
     *
     * @var array[]
     *
     * @phpstan-var array<string,array<string,SplUnitEnum>>
     */
    private static array $instances = [];

    /**
     * Instantiates a SplReflectionEnumUnitCase object
     *
     * @param object|string $class An enum instance or a name.
     * @param string $constant An enum constant name.
     *
     * @throws \ReflectionException if $class is not a \Ducks\Component\SplTypes\SplEnumerable interface.
     * @throws \ReflectionException in case the given class constant case does not exist.
     * @throws \ReflectionException if $constant is not a case.
     *
     * @phpcs:ignore Generic.Files.LineLength.TooLong
     * @phpstan-param \Ducks\Component\SplTypes\SplEnumerable|class-string<\Ducks\Component\SplTypes\SplEnumerable> $class An enum instance or a name.
     * @phpstan-param string $constant An enum constant name.
     *
     * @psalm-suppress UninitializedProperty
     * @psalm-suppress ImpureMethodCall
     *
     * @link https://www.php.net/manual/en/reflectionenumunitcase.construct.php
     */
    public function __construct($class, string $constant)
    {
        parent::__construct($class, $constant);

        if (!$this->getEnum()->hasCase($constant)) {
            /** @psalm-suppress PossiblyNullOperand */
            throw new \ReflectionException(
                'Enum case ' . $this->class . '::' . $this->name . ' is not a case'
            );
        }
    }

    /**
     * Gets the reflection of the enum of this case
     *
     * @return SplReflectionEnum instance describing the Enum this case belongs to.
     *
     * @throws \ReflectionException if objectOrClass is not a \Ducks\Component\SplTypes\SplEnumerable
     *
     * @phpstan-return SplReflectionEnum<\Ducks\Component\SplTypes\SplEnumerable>
     *
     * @psalm-suppress ArgumentTypeCoercion Needed because we need to throw Error on wrong type
     *
     * @see SplReflectionEnum::__construct()
     * @link https://www.php.net/manual/en/reflectionenumunitcase.getenum.php
     */
    public function getEnum(): SplReflectionEnum
    {
        /** @var SplReflectionEnum<\Ducks\Component\SplTypes\SplEnumerable> */
        return new SplReflectionEnum($this->class);
    }

    /**
     * Gets the enum case object described by this reflection object
     *
     * @return SplUnitEnum The enum case object described by this reflection object.
     *
     * @psalm-suppress MoreSpecificReturnType
     * @psalm-suppress LessSpecificReturnStatement
     * @psalm-suppress ImpureMethodCall
     * @psalm-suppress ImpureStaticProperty
     */
    public function getValue(): SplUnitEnum
    {
        if (!isset(self::$instances[$this->class][$this->name])) {
            self::$instances[$this->class][$this->name] = $this->getEnumValue();
        }

        return self::$instances[$this->class][$this->name];
    }

    /**
     * Gets the enum from the class and constant name.
     *
     * @return SplUnitEnum
     *
     * @psalm-suppress ImpureMethodCall
     */
    private function getEnumValue(): SplUnitEnum
    {
        $class = $this->getDeclaringClass();
        /** @var SplUnitEnum $instance */
        $instance = $class->newInstanceWithoutConstructor();

        $object = $class->getConstructor();
        if ($object instanceof \ReflectionMethod) {
            $object->setAccessible(true);
            $object->invoke($instance);

            if ($class->hasProperty('name')) {
                $property = $class->getProperty('name');
                $property->setAccessible(true);
                $property->setValue($instance, $this->name);
            }
        }

        return $instance;
    }
}
