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
 * SplStringEnum gives the ability to emulate and create int enumeration objects natively in PHP.
 *
 * @extends SplEnumBacked<string>
 *
 * @psalm-api
 */
abstract class SplStringEnum extends SplEnumBacked
{
    /**
     * Value of enum instance.
     *
     * @var string
     */
    protected string $value;

    /**
     * {@inheritdoc}
     */
    final protected function __construct()
    {
        $this->__default = '';

        parent::__construct();
    }

    /**
     * Method called when a script tries to call an object as a function.
     *
     * @return string
     *
     * @psalm-suppress MixedInferredReturnType
     */
    final public function &__invoke(): string
    {
        return $this->__default;
    }
}
