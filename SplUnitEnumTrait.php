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

use Ducks\Component\SplTypes\Reflection\SplReflectionEnum;
use Ducks\Component\SplTypes\Reflection\SplReflectionEnumUnitCase;

/**
 * Simplify SplUnitEnum integration
 *
 * @property-read string $name
 *
 * @phpstan-require-implements SplUnitEnum
 */
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
     * @return static[] An array of all defined cases of this enumeration, in order of declaration.
     *
     * @psalm-suppress MixedInferredReturnType
     *
     * @see SplUnitEnum::cases()
     */
    public static function cases(): array
    {
        static $cases = null;

        if (null === $cases) {
            $enum = new SplReflectionEnum(static::class);
            foreach ($enum->getCases() as $case) {
                $cases[] = $case->getValue();
            }
        }

        return $cases ?? [];
    }

    /**
     * Return a new instance of enum
     *
     * @param string $name
     * @param mixed[] $arguments
     *
     * @return static self keywords not an equivalent
     *
     * @throws \Error if $name is not a valid constant enum
     *
     * @phpstan-param string $name
     * @phpstan-param list<mixed> $arguments
     * @phpstan-return static
     * @phpstan-ignore-next-line
     *
     * @psalm-suppress UnsafeInstantiation
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
