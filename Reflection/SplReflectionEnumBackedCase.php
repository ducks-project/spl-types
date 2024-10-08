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
 * The SplReflectionEnumBackedCase class reports info about an SplEnum backed case, which has no scalar equivalent.
 *
 * @psalm-api
 * @psalm-immutable
 * @psalm-suppress PropertyNotSetInConstructor
 */
class SplReflectionEnumBackedCase extends SplReflectionEnumUnitCase
{
    /**
     * Instantiates a ReflectionEnumBackedCase object
     *
     * @param object|string $class An enum instance or a name.
     * @param string $constant An enum constant name.
     *
     * @throws \ReflectionException if $class is not a \ReflectionEnumBackedCase
     *
     * @phpcs:ignore Generic.Files.LineLength.TooLong
     * @phpstan-param \Ducks\Component\SplTypes\SplEnumerable|class-string<\Ducks\Component\SplTypes\SplEnumerable> $class An enum instance or a name.
     * @phpstan-param string $constant An enum constant name.
     *
     * @psalm-suppress UninitializedProperty
     * @psalm-suppress ImpureMethodCall
     *
     * @link https://www.php.net/manual/en/reflectionenumbackedcase.construct.php
     */
    public function __construct($class, string $constant)
    {
        parent::__construct($class, $constant);

        if (!$this->getEnum()->isBacked()) {
            /** @psalm-suppress PossiblyNullOperand */
            throw new \ReflectionException(
                'Enum case ' . $this->class . '::' . $this->name . ' is not a backed case'
            );
        }
    }

    /**
     * Gets the scalar value backing this Enum case
     *
     * @return mixed The scalar equivalent of this enum case.
     *
     * @link https://www.php.net/manual/en/reflectionenumbackedcase.getbackingvalue.php
     */
    public function getBackingValue()
    {
        return $this->getDeclaringClass()
            ->getConstant($this->name);
    }

    /**
     * {@inheritdoc}
     *
     * @return SplUnitEnum The enum case object described by this reflection object.
     *
     * @psalm-suppress ImpureMethodCall
     */
    public function getValue(): SplUnitEnum
    {
        $instance = parent::getValue();

        $class = new \ReflectionObject($instance);
        if ($class->hasProperty('value')) {
            $property = $class->getProperty('value');
            $property->setAccessible(true);
            $property->setValue($instance, $class->getConstant($this->name));
        }

        return $instance;
    }
}
