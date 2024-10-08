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
 * SplEnumBackedTrait expose magic method in order to use an SplEnum class which implements SplBackedEnum.
 *
 * @template T
 *
 * @phpstan-require-extends SplEnum
 * @phpstan-require-implements SplBackedEnum
 *
 * @psalm-api
 */
trait SplEnumBackedTrait
{
    use SplEnumUnitTrait {
        SplEnumUnitTrait::__serialize as private __unitSerialize;
        SplEnumUnitTrait::__unserialize as private __unitUnserialize;
        SplEnumUnitTrait::__set_state as private __unitSetState;
        SplEnumUnitTrait::__debugInfo as private __unitDebugInfo;
    }

    /**
     * Serialize object.
     *
     * @return mixed[]
     *
     * @phpstan-return array<string,mixed>
     *
     * @psalm-suppress LessSpecificImplementedReturnType
     */
    public function __serialize(): array
    {
        $result = $this->__unitSerialize();

        return $result;
    }

    /**
     * Unserialize object.
     *
     * @param mixed[] $data
     *
     * @return void
     *
     * @phpstan-param array<string,mixed> $data
     * @phpstan-return void
     *
     * @psalm-suppress UnsupportedPropertyReferenceUsage
     */
    public function __unserialize(array $data): void
    {
        $this->__unitUnserialize($data);

        $this->value = &$this->__default;
    }

    /**
     * Instanciate an exported object.
     *
     * @param mixed[] $properties
     *
     * @return static
     *
     * @phpstan-param array<string,mixed> $properties
     * @phpstan-return static
     *
     * @psalm-suppress UnsafeInstantiation
     */
    #[\ReturnTypeWillChange]
    public static function __set_state(array $properties): SplBackedEnum
    {
        /** @phpstan-var T $value */
        $value = $properties['value'];

        $object = self::__unitSetState($properties);
        $object->value = $value;

        /** @var static $object */
        return $object;
    }

    /**
     * Dumping object.
     *
     * @return mixed[]
     *
     * @phpstan-return array<string,mixed>
     *
     * @psalm-suppress LessSpecificImplementedReturnType
     *
     * @codeCoverageIgnore
     */
    public function __debugInfo(): array
    {
        /** @phpstan-var T $value */
        $value = $this->value;

        $result = $this->__unitDebugInfo();
        $result['value'] = $value;

        return $result;
    }
}
