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

namespace Ducks\Component\SplTypes\Reflection;

/**
 * The ReflectionEnum class reports information about an Enum.
 *
 * @link https://php.net/manual/en/class.reflectionenum.php
 */
final class SplReflectionEnumHelper
{
    /**
     * Array of \ReflectionNamedType for types
     *
     * @var \ReflectionNamedType[]
     *
     * @phpstan-var array<string,\ReflectionNamedType>
     */
    private static array $rnt = [];

    /**
     * @psalm-suppress UnusedConstructor
     */
    private function __construct()
    {
    }

    /**
     * Get \ReflectionNamedType from internal ReflectionFunction closure.
     *
     * @param \ReflectionFunction $func
     *
     * @return \ReflectionNamedType
     */
    private static function getReflectionNamedType(\ReflectionFunction $func): \ReflectionNamedType
    {
        /** @var \ReflectionNamedType $type */
        $type = ($func->getParameters()[0])->getType();

        return $type;
    }

    /**
     * Get SplReflectionNamedType from a type.
     *
     * @param string $type
     * @return \ReflectionNamedType
     *
     * @phpstan-param non-empty-string $type
     * @phpstan-return \ReflectionNamedType
     */
    private static function getTypedReflectionNamedType(string $type): \ReflectionNamedType
    {
        if (!isset(static::$rnt[$type])) {
            static::$rnt[$type] = new SplReflectionNamedType($type);
        }

        return static::$rnt[$type];
    }

    /**
     * Return ReflectionNamedType from a $type (Internal use).
     *
     * @param string $type
     * @return \ReflectionNamedType
     */
    public static function getReflectionNamedTypeFromType(string $type): \ReflectionNamedType
    {
        switch ($type) {
            case 'string':
                $result = self::getStringReflectionNamedType();
                break;

            case 'integer':
            case 'int':
                $result = self::getIntReflectionNamedType();
                break;

            case 'double':
            case 'float':
                $result = self::getFloatReflectionNamedType();
                break;

            case 'boolean':
            case 'bool':
                $result = self::getBoolReflectionNamedType();
                break;

            case 'array':
                $result = self::getArrayReflectionNamedType();
                break;

            case 'object':
                $result = self::getObjectReflectionNamedType();
                break;

            case 'mixed':
            case 'unknown type':
                $result = self::getTypedReflectionNamedType('mixed');
                break;

            default:
                /** @phpstan-var non-empty-string $type */
                $result = self::getTypedReflectionNamedType($type);
                break;
        }

        return $result;
    }

    /**
     * Only way to generate a string ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getStringReflectionNamedType(): \ReflectionNamedType
    {
        if (!isset(static::$rnt['string'])) {
            static::$rnt['string'] = static::getReflectionNamedType(
                new \ReflectionFunction(static fn(string $param): string => $param)
            );
        }

        return static::$rnt['string'];
    }

    /**
     * Only way to generate an int ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getIntReflectionNamedType(): \ReflectionNamedType
    {
        if (!isset(static::$rnt['int'])) {
            static::$rnt['int'] = static::getReflectionNamedType(
                new \ReflectionFunction(static fn (int $param): int => $param)
            );
        }

        return static::$rnt['int'];
    }

    /**
     * Only way to generate a float ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getFloatReflectionNamedType(): \ReflectionNamedType
    {
        if (!isset(static::$rnt['float'])) {
            static::$rnt['float'] = static::getReflectionNamedType(
                new \ReflectionFunction(static fn(float $param): float => $param)
            );
        }

        return static::$rnt['float'];
    }

    /**
     * Only way to generate a bool ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getBoolReflectionNamedType(): \ReflectionNamedType
    {
        if (!isset(static::$rnt['bool'])) {
            static::$rnt['bool'] = static::getReflectionNamedType(
                new \ReflectionFunction(static fn(bool $param): bool => $param)
            );
        }

        return static::$rnt['bool'];
    }

    /**
     * Only way to generate an array ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getArrayReflectionNamedType(): \ReflectionNamedType
    {
        if (!isset(static::$rnt['array'])) {
            static::$rnt['array'] = static::getReflectionNamedType(
                new \ReflectionFunction(static fn(array $param): array => $param)
            );
        }

        return static::$rnt['array'];
    }

    /**
     * Only way to generate an object ReflectionNamedType (Internal use).
     *
     * @return \ReflectionNamedType
     */
    public static function getObjectReflectionNamedType(): \ReflectionNamedType
    {
        if (!isset(static::$rnt['object'])) {
            static::$rnt['object'] = static::getReflectionNamedType(
                new \ReflectionFunction(static fn(object $param): object => $param)
            );
        }

        return static::$rnt['object'];
    }
}
