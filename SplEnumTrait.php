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
 * Trait used for enum emulation
 *
 * @psalm-api
 */
trait SplEnumTrait
{
    /**
     * Generates a list of cases on an enum
     *
     * @return array An array of all defined cases of this enumeration, in order of declaration.
     */
    public static function cases(): array
    {
        static $cases = null;

        if (!isset($cases)) {
            $enum = new \ReflectionEnum(static::class);
            foreach ($enum->getCases() as $case) {
                $cases[] = $case->getValue();
            }
        }

        return $cases ?? [];
    }

    /**
     * Maps a scalar to an enum instance
     *
     * @param int|string $value The scalar value to map to an enum case.
     *
     * @return SplEnum A case instance of this enumeration.
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
     * Maps a scalar to an enum instance or null
     *
     * @param int|string $value e scalar value to map to an enum case.
     *
     * @return SplEnum|null A case instance of this enumeration, or null if not found.
     */
    final public static function tryFrom($value): ?self
    {
        foreach (static::cases() as $case) {
            if ($case->value === $value) {
                $result = $case;
                break;
            }
        }

        return $result ?? null;
    }
}
