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

use Ducks\Component\SplTypes\SplString;

class SplStringBench
{
    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateEmpty(): void
    {
        new SplString();
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateTest(): void
    {
        new SplString('test');
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateNumeric(): void
    {
        new SplString((string) mt_rand());
    }
}
