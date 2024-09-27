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
#[\AllowDynamicProperties]
abstract class SplEnumBacked extends SplEnumUnit implements SplBackedEnum
{
    use SplBackedEnumTrait;

    /**
     * {@inheritdoc}
     */
    protected function __construct()
    {
        // Value can be undeclare because typed definition can change.
        $this->value = &$this->__default;
    }

    /**
     * Instanciate an exported object.
     *
     * @param array<mixed,mixed> $properties
     *
     * @return SplBackedEnum
     *
     * @codeCoverageIgnore
     * @psalm-suppress UnsafeInstantiation
     */
    #[\ReturnTypeWillChange]
    public static function __set_state(array $properties): SplBackedEnum
    {
        /** @var SplEnumBacked $object */
        $object = parent::__set_state($properties);
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
