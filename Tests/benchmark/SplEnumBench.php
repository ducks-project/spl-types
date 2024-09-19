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

use Ducks\Component\SplTypes\Tests\common\Month;

class SplEnumBench
{
    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateMonth(): void
    {
        new Month();
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateSeptemberMonth(): void
    {
        new Month(Month::SEPTEMBER);
    }

    /**
     * @Revs(1000)
     *
     * @Iterations(5)
     *
     * @return void
     */
    public function benchCreateUnstrictMonth(): void
    {
        new Month('1', false);
    }
}
