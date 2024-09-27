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
 * SplIntEnum gives the ability to emulate and create int enumeration objects natively in PHP.
 *
 * @psalm-api
 */
abstract class SplIntEnum extends SplEnumBacked
{
    /**
     * Value of enum instance
     *
     * @var int
     */
    protected int $value;

    /**
     * {@inheritdoc}
     */
    final protected function __construct()
    {
        $this->__default = 0;

        parent::__construct();
    }

    final public function &__invoke(): int
    {
        return $this->__default;
    }
}
