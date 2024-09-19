# [The SplString class](#The-SplString-class)

(PHP 5, PHP 7, PHP 8)
Check for [pecl SPL_Types]

## [Introduction](#Introduction)

The SplString class is used to enforce strong typing of the string type.

## [Class synopsis](#Class-synopsis)

```php
SplString extends SplType {
    /* Constants */
    const string __default = '';
    /* Inherited methods */
    SplType::__construct ([ mixed $initial_value [, bool $strict ]] )
}
```

## [Predefined Constants](#Predefined-Constants)

**SplString::__default**

## [Examples](#Examples)

### Example #1 SplString usage example

```php
<?php
$string = new SplString("Testing");

try {
    $string = array();
} catch (UnexpectedValueException $uve) {
    echo $uve->getMessage() . PHP_EOL;
}

var_dump($string);
echo $string; // Outputs "Testing"
```

The above example will output:

> ```
> Value not a string
> object(SplString)#1 (1) {
>     ["__default"] => string(7) "Testing"
> }
> Testing
> ```

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type

## [See Also](#See-Also)

- [`SplType`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
