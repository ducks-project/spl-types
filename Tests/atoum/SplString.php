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
class SplString extends atoum
{

    public function test()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->string((string) $this->testedInstance)
                    ->isEqualTo('')
        ;

        $this
            ->given($this->newTestedInstance('test'))
            ->then
                ->string((string) $this->testedInstance)
                    ->isEqualTo('test')
        ;

        $this
            ->given($this->newTestedInstance(0, false))
            ->then
                ->string((string) $this->testedInstance)
                    ->isEqualTo('0')
        ;
    }

    public function test_unexpected_value_exception_int()
    {
        $this
            ->exception(
                function() {
                    $this->newTestedInstance(0);
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }

    public function test_unexpected_value_exception_scalar()
    {
        $this
            ->exception(
                function() {
                    $this->newTestedInstance(array());
                }
            )
            ->isInstanceOf('\UnexpectedValueException')
        ;
    }

}
