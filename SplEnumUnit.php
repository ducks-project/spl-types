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
 * SplEnumBacked gives the ability to emulate and create backed enumeration objects natively in PHP.
 *
 * @psalm-api
 */
abstract class SplEnumUnit extends SplEnum implements
    SplEnumSingletonable,
    SplUnitEnum
{
    use SplUnitEnumTrait;

    /**
     * {@inheritdoc}
     */
    protected function __construct()
    {
    }

    /**
     * Instanciate an exported object.
     *
     * @param array<mixed,mixed> $properties
     *
     * @return SplUnitEnum
     *
     * @codeCoverageIgnore
     * @psalm-suppress UnsafeInstantiation
     */
    public static function __set_state(array $properties): SplUnitEnum
    {
        /** @var SplEnumUnit $object */
        $object = /** @scrutinizer ignore-call */ new static();
        $object->name = $properties['name'];

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
        ];
    }
}
