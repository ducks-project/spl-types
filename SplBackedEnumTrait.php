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

use Ducks\Component\SplTypes\Reflection\SplReflectionEnumBackedCase;

/**
 * Simplify SplBackedEnum integration
 *
 * @template T
 *
 * @phpstan-require-implements SplBackedEnum
 */
trait SplBackedEnumTrait
{
    use SplUnitEnumTrait;

    /**
     * Maps a scalar to an enum instance.
     *
     * @param int|string $value The scalar value to map to an enum case.
     *
     * @return static A case instance of this enumeration.
     *
     * @throws \ValueError if $value is not a valid backing value for enum
     */
    final public static function from($value): self
    {
        $case = static::tryFrom($value);

        if (null === $case) {
            throw new \ValueError(
                sprintf('%s is not a valid backing value for enum "%s"', \json_encode($value), static::class)
            );
        }

        return $case;
    }

    /**
     * Maps a scalar to an enum instance or null.
     *
     * @param int|string|mixed $value e scalar value to map to an enum case.
     *
     * @return static|null A case instance of this enumeration, or null if not found.
     */
    final public static function tryFrom($value): ?self
    {
        foreach (static::cases() as $case) {
            /**
             * @var SplEnumBacked $case
             * @phpstan-var SplEnumBacked<T> $case
             */
            if ($case->value === $value) {
                $result = $case;
                break;
            }
        }

        /** @var static $result */
        return $result ?? null;
    }

    /**
     * Return a new instance of enum.
     *
     * @param string $name
     * @param array<int,mixed> $arguments
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
            $unit = new SplReflectionEnumBackedCase(static::class, $name);
            $object = $unit->getValue();
        } catch (\ReflectionException $th) {
            throw new \Error('Undefined constant ' . static::class . '::' . $name);
        }

        /** @var static $object */
        return $object;
    }
}
