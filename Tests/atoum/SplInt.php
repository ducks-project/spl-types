<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes\Tests\atoum;

use mageekguy\atoum;

/**
 * @namespace \Tests\atoum
 */
class SplInt extends atoum
{
    public function test()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->integer((int) (string) $this->testedInstance)
                    ->isEqualTo(0)
        ;

        $this
            ->given($this->newTestedInstance(10))
            ->then
                ->integer((int) (string) $this->testedInstance)
                    ->isEqualTo(10)
        ;

        $this
            ->given($this->newTestedInstance(10.0, false))
            ->then
                ->integer((int) (string) $this->testedInstance)
                    ->isEqualTo(10)
        ;
    }

    public function test_unexpected_value_exception_float()
    {
        $this
            ->exception(
                function() {
                    $this->newTestedInstance(10.0);
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }

    public function test_unexpected_value_exception_string()
    {
        $this
            ->exception(
                function() {
                    $this->newTestedInstance('test');
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }
}
