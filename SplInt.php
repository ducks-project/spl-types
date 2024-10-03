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
 * The SplInt class is used to enforce strong typing of the integer type.
 *
 * @extends SplType<int>
 *
 * @psalm-api
 */
class SplInt extends SplType
{
    /**
     * @var int
     *
     * @psalm-suppress InvalidClassConstantType
     */
    // phpcs:ignore Generic.NamingConventions.UpperCaseConstantName.ClassConstantNotUpperCase
    protected const __default = 0;

    /**
     * {@inheritdoc}
     *
     * @param int $initial_value
     *
     * @SuppressWarnings(PHPMD.CamelCaseParameterName)
     * @SuppressWarnings(PHPMD.CamelCaseVariableName)
     */
    public function __construct(int $initial_value = self::__default)
    {
        parent::__construct($initial_value);
    }

    final public function &__invoke(): int
    {
        /** @var int */
        return $this->__default;
    }
}
