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
class SplBool extends atoum
{
    public function test()
    {
        $this
            ->given($this->newTestedInstance)
            ->then
                ->boolean((bool) (string) $this->testedInstance)
                    ->isEqualTo(false)
        ;

        $this
            ->given($this->newTestedInstance(true))
            ->then
                ->boolean((bool) (string) $this->testedInstance)
                    ->isEqualTo(true)
        ;

        $this
            ->given($this->newTestedInstance(1, false))
            ->then
                ->boolean((bool) (string) $this->testedInstance)
                    ->isEqualTo(true)
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

    public function test_list()
    {
        $list = array(
            '__default' => false,
            'false' => false,
            'true' => true
        );

        $this
            ->given($this->newTestedInstance)
            ->then
                ->array($this->testedInstance->getConstList(true))
                    ->isEqualTo($list)
        ;

        unset($list['__default']);

        $this
            ->given($this->newTestedInstance)
            ->then
                ->array($this->testedInstance->getConstList())
                    ->isEqualTo($list)
        ;
    }
}
