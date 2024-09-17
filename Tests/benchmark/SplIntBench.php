<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes\Tests\benchmark;

use Ducks\Component\SplTypes\SplInt;

class SplIntBench
{
    /**
     * @Revs(1000)
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateZero()
    {
        new SplInt();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateRand()
    {
        new SplInt(mt_rand());
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateMin()
    {
        new SplInt(PHP_INT_MIN);
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateMax()
    {
        new SplInt(PHP_INT_MAX);
    }
}
