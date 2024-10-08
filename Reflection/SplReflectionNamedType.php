<?php

namespace Ducks\Component\SplTypes\Reflection;

/**
 * ReflectionNamedType mock Class
 *
 * @psalm-immutable
 */
class SplReflectionNamedType extends \ReflectionNamedType
{
    private const BUILT_IN_TYPES = [
        'int',
        'float',
        'string',
        'bool',
        'callable',
        'self',
        'parent',
        'array',
        'iterable',
        'object',
        'void',
        'mixed',
        'static',
        'null',
        'never',
        'false',
        'true',
    ];

    /**
     * The $name replacement
     *
     * @var string
     *
     * @phpstan-var non-empty-string
     */
    private string $naming;

    /**
     * The $allowsNull replacement
     *
     * @var boolean
     */
    private bool $nullable;

    /**
     * Build a fake \ReflectionNamedType
     *
     * @param string $name
     * @param boolean $nullable
     *
     * @phpstan-param non-empty-string $name
     * @phpstan-param boolean $nullable
     */
    public function __construct(string $name, bool $nullable = false)
    {
        $this->naming = $name;

        // Force nullable for native type name
        switch (\strtolower($name)) {
            case 'mixed':
            case 'null':
                $this->nullable = true;
                break;
            default:
                $this->nullable = $nullable;
                break;
        }
    }

    /**
     * @inheritDoc
     *
     * @see https://www.php.net/manual/en/reflectionnamedtype.getname.php
     */
    public function getName(): string
    {
        return $this->naming;
    }

    /**
     * @inheritDoc
     *
     * @see https://php.net/manual/en/reflectiontype.isbuiltin.php
     */
    public function isBuiltin(): bool
    {
        return \in_array(\strtolower($this->getName()), self::BUILT_IN_TYPES);
    }

    /**
     * @inheritDoc
     *
     * @see https://www.php.net/manual/fr/reflectiontype.allowsnull.php
     */
    public function allowsNull(): bool
    {
        return $this->nullable;
    }

    /**
     * @inheritDoc
     *
     * @see https://www.php.net/manual/fr/reflectiontype.tostring.php
     */
    public function __toString(): string
    {
        return $this->getName();
    }
}
