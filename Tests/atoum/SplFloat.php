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
class SplFloat extends atoum
{
    public function test()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->float((float) (string) $this->testedInstance)
                    ->isEqualTo(0.0)
        ;

        $this
            ->given($this->newTestedInstance(10.1))
            ->then
                ->float((float) (string) $this->testedInstance)
                    ->isEqualTo(10.1)
        ;

        $this
            ->given($this->newTestedInstance('10.1', false))
            ->then
                ->float((float) (string) $this->testedInstance)
                    ->isEqualTo(10.1)
        ;
    }

    public function test_unexpected_value_exception_bool()
    {
        $this
            ->exception(
                function() {
                    $this->newTestedInstance(false);
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
                    $this->newTestedInstance('10');
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }
}
