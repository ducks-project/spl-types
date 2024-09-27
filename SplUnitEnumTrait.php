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

use Ducks\Component\SplTypes\Reflection\SplReflectionEnumUnitCase;

trait SplUnitEnumTrait
{
    use SplEnumSingletonTrait;

    /**
     * case-sensitive name of the case itself.
     *
     * @var string
     */
    protected string $name;

    /**
     * Generates a list of cases on an enum
     *
     * @return array<int, UnitEnum|BackedEnum>
     * An array of all defined cases of this enumeration, in order of declaration.
     */
    public static function cases(): array
    {
        static $cases = null;

        if (null === $cases) {
            $enum = new \ReflectionEnum(static::class);
            foreach ($enum->getCases() as $case) {
                /** @var Reflection\SplReflectionEnumUnitCase $case */
                $cases[] = $case->getValue();
            }
        }

        return $cases ?? [];
    }

    /**
     * Return a new instance of enum
     *
     * @param string $name
     * @param array $arguments
     *
     * @return static self keywords not an equivalent
     *
     * @psalm-suppress UnsafeInstantiation
     * @phpstan-ignore-next-line
     */
    #[\ReturnTypeWillChange]
    public static function __callStatic(string $name, array $arguments)
    {
        try {
            $unit = new SplReflectionEnumUnitCase(static::class, $name);
            $object = $unit->getValue();
        } catch (\ReflectionException $th) {
            throw new \Error('Undefined constant ' . static::class . '::' . $name);
        }

        /** @var static $object */
        return $object;
    }
}
