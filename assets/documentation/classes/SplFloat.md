# [The SplFloat class](#The-SplFloat-class)

(PHP 5, PHP 7, PHP 8)

## [Introduction](#Introduction)

The SplFloat class is used to enforce strong typing of the float type.

## [Class synopsis](#Class-synopsis)

```php
SplFloat extends SplType {
    /* Constants */
    public const float __default = 0.0;
    /* Methods */
    public function __construct ([ float $initial_value = 0.0 ])
    final public function &__invoke(): float
}
```

## [Predefined Constants](#Predefined-Constants)

**SplFloat::__default**

## [Examples](#Examples)

### Example #1 SplFloat usage example

```php
<?php
$float = new SplFloat(3.154);
$newFloat = new SplFloat(3);

echo $float . PHP_EOL;
echo $newFloat . PHP_EOL;
```

The above example will output:

> ```
> 3.154
> 3
> ```

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type
- [SplFloat::__invoke] — Invoke object like a method

## [See Also](#See-Also)

- [`SplType`]
- [`SplInt`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[SplFloat::__invoke]: ./SplFloat.invoke.md#SplFloat::__invoke
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
