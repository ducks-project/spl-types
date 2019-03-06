<?php

/**
 * Polyfill.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$splTypes = array(
    'SplType',
    'SplBool',
    'SplEnum',
    'SplFloat',
    'SplInt',
    'SplString'
);

foreach ($splTypes as $splType) {
    if (!class_exists($SplType, false)) {
        class_alias('\Ducks\Component\SplTypes\' . $splType, $splType, true);
    }
}
