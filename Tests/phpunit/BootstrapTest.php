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

namespace Ducks\Component\SplTypes\Tests\phpunit;

use Ducks\Component\SplTypes\SplBool as DuckBool;
use Ducks\Component\SplTypes\SplEnum as DuckEnum;
use Ducks\Component\SplTypes\SplFloat as DuckFloat;
use Ducks\Component\SplTypes\SplInt as DuckInt;
use Ducks\Component\SplTypes\SplString as DuckString;
use Ducks\Component\SplTypes\SplType as DuckType;
use PHPUnit\Framework\TestCase;

class BootstrapTest extends TestCase
{
    /**
     * Unit test.
     *
     * @return void
     *
     * @coversNothing
     */
    public function test(): void
    {
        $splTypes = [
            \SplType::class => DuckType::class,
            \SplInt::class => DuckInt::class,
            \SplFloat::class => DuckFloat::class,
            \SplEnum::class => DuckEnum::class,
            \SplBool::class => DuckBool::class,
            \SplString::class => DuckString::class,
        ];

        foreach ($splTypes as $splType => $duckType) {
            $this->assertTrue(\is_a($splType, $duckType, true));
        }
    }
}
