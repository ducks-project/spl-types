# [The SplString class](#The-SplString-class)

(PHP 5, PHP 7, PHP 8)

## [Introduction](#Introduction)

The SplString class is used to enforce strong typing of the string type.

## [Class synopsis](#Class-synopsis)

```php
SplString extends SplType {
    /* Constants */
    public const string __default = '';
    /* Methods */
    public function __construct ([ string $initial_value = '' ])
    final public function &__invoke(): string
}
```

## [Predefined Constants](#Predefined-Constants)

**SplString::__default**

## [Examples](#Examples)

### Example #1 SplString usage example

```php
<?php
$string = new SplString("Testing");

var_dump($string);
echo $string; // Outputs "Testing"
```

The above example will output:

> ```
> object(SplString)#1 (1) {
>     ["__default"] => string(7) "Testing"
> }
> Testing
> ```

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type
- [SplString::__invoke] — Invoke object like a method

## [See Also](#See-Also)

- [`SplType`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[SplString::__invoke]: ./SplString.invoke.md#SplString::__invoke
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
