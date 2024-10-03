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
        SplEnumUnitTrait::__serialize as __unitSerialize;
        SplEnumUnitTrait::__unserialize as __unitUnserialize;
        SplEnumUnitTrait::__set_state as __unitSetState;
    }

    /**
     * Serialize object.
     *
     * @return array<string,mixed>
     */
    public function __serialize(): array
    {
        $result = $this->__unitSerialize();

        return $result;
    }

    /**
     * Unserialize object.
     *
     * @param array<string,mixed> $data
     *
     * @return void
     */
    public function __unserialize(array $data): void
    {
        $this->__unitUnserialize($data);

        $this->value = &$this->__default;
    }

    /**
     * Instanciate an exported object.
     *
     * @param array<string,mixed> $properties
     *
     * @return static
     *
     * @psalm-suppress UnsafeInstantiation
     */
    #[\ReturnTypeWillChange]
    public static function __set_state(array $properties): SplBackedEnum
    {
        /** @var static $object */
        $object = static::__unitSetState($properties);
        $object->value = $properties['value'];

        return $object;
    }

    /**
     * Dumping object.
     *
     * @return array<string,string>
     *
     * @codeCoverageIgnore
     */
    public function __debugInfo(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}
