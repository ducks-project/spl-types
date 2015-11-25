<?php

namespace Ducks\Component\SplTypes {

    /**
     * The SplBool class is used to enforce strong typing of the bool type.
     * @see SplBool http://php.net/manual/en/class.splbool.php
     */
    class SplBool extends SplEnum {

        /**
         * @var bool
         */
        const __default = self::false;

        /**
         * @var bool
         */
        const false = false;

        /**
         * @var bool
         */
        const true = true;

    }

}
