<?php

namespace Ducks\Component\SplTypes {

    /**
     * SplEnum gives the ability to emulate and create enumeration objects natively in PHP.
     * @see SplEnum http://php.net/manual/en/class.splenum.php
     */
    class SplEnum extends SplType {

        /**
         * Returns all consts (possible values) as an array.
         * @param bool $include_default Whether to include __default property.
         * @return array
         */
        final public function getConstList( $include_default=false ) {
            $class = new \ReflectionClass($this);
            $constants = $class->getConstants();
            if (!$include_default) {
                unset($constants['__default']);
            }
            return $constants;
        }

    }

}
