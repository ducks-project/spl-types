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
 * SplEnumUnitTrait expose magic method in order to use an SplEnum class which implements SplUnitEnum.
 *
 * @phpstan-require-extends SplEnum
 * @phpstan-require-implements SplUnitEnum
 *
 * @psalm-api
 */
trait SplEnumUnitTrait
{
    /**
     * Serialize object.
     *
     * @return mixed[]
     *
     * @phpstan-return array<string,mixed>
     */
    public function __serialize(): array
    {
        $result = parent::__serialize();
        $result['name'] = $this->name;

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
     */
    public function __unserialize(array $data): void
    {
        parent::__unserialize($data);

        $this->name = (string) $data['name'];
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
    public static function __set_state(array $properties): SplUnitEnum
    {
        /**
         * @var static $object
         */
        // @phpstan-ignore-next-line
        $object = /** @scrutinizer ignore-call */ new static();
        $object->name = (string) $properties['name'];

        return $object;
    }

    /**
     * Dumping object.
     *
     * @return string[]
     *
     * @phpstan-return array<string,mixed>
     *
     * @codeCoverageIgnore
     */
    public function __debugInfo(): array
    {
        $result = parent::__debugInfo();
        $result['name'] = $this->name;

        return $result;
    }
}
