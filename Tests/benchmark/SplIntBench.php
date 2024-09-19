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

namespace Ducks\Component\SplTypes\Tests\benchmark;

use Ducks\Component\SplTypes\SplInt as DuckInt;

class SplIntBench
{
    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateZero(): void
    {
        new DuckInt();
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateRand(): void
    {
        new DuckInt(mt_rand());
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateMin(): void
    {
        new DuckInt(PHP_INT_MIN);
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateMax(): void
    {
        new DuckInt(PHP_INT_MAX);
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     *
     * @psalm-suppress UnsupportedReferenceUsage
     */
    public function benchMath(): void
    {
        $instance = new DuckInt(10);

        $value = &$instance();
        $value++;

        $result = $value;
        unset($result);
    }
}
