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
 * Trait used for magic.
 *
 * @template T
 *
 * @phpstan-require-extends SplType
 *
 * @psalm-api
 */
trait SplTypeTrait
{
    /**
     * Internal enum value.
     *
     * @var mixed
     *
     * @phpstan-var T
     */
    // phpcs:ignore PSR2.Classes.PropertyDeclaration.Underscore
    protected $__default = null;

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return mixed
     *
     * @phpstan-return T
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
     *
     * @phpstan-return array<string,T>
     */
    public function __serialize(): array
    {
        return [
            '__default' => $this->__default,
        ];
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
        $this->__default = $data['__default'];
    }

    /**
     * Method called when a script tries to call an object as a function.
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function &__invoke()
    {
        return $this->__default;
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
     * Instanciate an exported object.
     *
     * @param array<string,mixed> $properties
     *
     * @return static
     *
     * @phpstan-param array<string,T> $properties
     * @phpstan-return static
     *
     * @psalm-suppress UnsafeInstantiation
     */
    public static function __set_state(array $properties): object
    {
        // @phpstan-ignore-next-line
        return /** @scrutinizer ignore-call */ new static($properties['__default'] ?? null);
    }

    /**
     * Dumping object.
     *
     * @return array<string,mixed>
     *
     * @phpstan-return array<string,T>
     *
     * @codeCoverageIgnore
     */
    public function __debugInfo(): array
    {
        return [
            '__default' => $this->__default,
        ];
    }
}
