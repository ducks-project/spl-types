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

use Ducks\Component\SplTypes\SplBool;

class SplBoolBench
{
    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateTrue(): void
    {
        new SplBool();
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateFalse(): void
    {
        new SplBool();
    }
}
