<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes;

/**
 * Trait used for magic
 *
 * @psalm-api
 */
trait SplTypeTrait
{
    /**
     * Internal enum value.
     *
     * @var mixed
     */
    // phpcs:ignore PSR2.Classes.PropertyDeclaration.Underscore
    protected $__default;

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->__default;
    }

    /**
     * Serialize object.
     *
     * @return array<string,mixed>
     */
    final public function __serialize(): array
    {
        return [
            '__default' => $this->__default,
        ];
    }

    /**
     * Unserialize object.
     *
     * @param array<string,mixed> $data
     * @return void
     */
    final public function __unserialize(array $data): void
    {
        $this->__default = $data['__default'];
    }

    /**
     * Stringify object.
     *
     * @return string
     */
    final public function __toString(): string
    {
        return (string) $this->__default;
    }

    /**
     * Export object.
     *
     * @param array<mixed,mixed> $properties
     *
     * @return SplType
     *
     * @codeCoverageIgnore
     * @psalm-suppress UnsafeInstantiation
     */
    final public static function __set_state(array $properties): object
    {
        return /** @scrutinizer ignore-call */ new static($properties['__default']);
    }

    /**
     * Dumping object.
     *
     * @return array<string,mixed>
     *
     * @codeCoverageIgnore
     */
    final public function __debugInfo(): array
    {
        return [
            '__default' => $this->__default,
        ];
    }
}
