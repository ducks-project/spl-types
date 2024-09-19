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

use Ducks\Component\SplTypes\SplFloat as DuckFloat;

class SplFloatBench
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
        new DuckFloat();
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
        new DuckFloat((float) mt_rand());
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
        new DuckFloat(PHP_FLOAT_MIN);
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
        new DuckFloat(PHP_FLOAT_MAX);
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
        $instance = new DuckFloat(10.1);

        $value = &$instance();
        $value++;

        $result = $value;
        unset($result);
    }
}
