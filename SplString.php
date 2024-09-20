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
 * The SplString class is used to enforce strong typing of the string type.
 *
 * @psalm-api
 */
class SplString extends SplType
{
    /**
     * @var string
     *
     * @psalm-suppress InvalidClassConstantType
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    public const __default = '';

    /**
     * {@inheritdoc}
     *
     * @param string $initial_value
     *
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function __construct(string $initial_value = self::__default)
    {
        parent::__construct($initial_value);
    }

    final public function &__invoke(): string
    {
        return $this->__default;
    }
}
