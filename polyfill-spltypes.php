<?php

if (!class_exists("SplType", false)) {
    class_alias("\Ducks\Component\SplTypes\SplType", "SplType");
    class_alias("\Ducks\Component\SplTypes\SplBool", "SplBool");
    class_alias("\Ducks\Component\SplTypes\SplEnum", "SplEnum");
    class_alias("\Ducks\Component\SplTypes\SplFloat", "SplFloat");
    class_alias("\Ducks\Component\SplTypes\SplInt", "SplInt");
    class_alias("\Ducks\Component\SplTypes\SplString", "SplString");
}
