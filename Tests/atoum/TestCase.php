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

abstract class TestCase extends atoum
{

   public function __construct(score $score = null, locale $locale = null, adapter $adapter = null)
   {
        $this->setTestNamespace('\\Tests\\atoum');
        parent::__construct($score, $locale, $adapter);
   }

}
