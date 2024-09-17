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

class SplEnumBench
{
    public function __construct()
    {
        require __DIR__ . '/../common/Fixtures/Month.php';
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateMonth()
    {
        new \Month();
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateSeptemberMonth()
    {
        new \Month(\Month::SEPTEMBER);
    }

    /**
     * @Revs(1000)
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateUnstrictMonth()
    {
        new \Month('1', false);
    }
}
