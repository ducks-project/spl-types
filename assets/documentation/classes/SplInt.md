# [The SplInt class](#The-SplInt-class)

(PHP 7, PHP 8)

## [Introduction](#Introduction)

The SplInt class is used to enforce strong typing of the integer type.

## [Class synopsis](#Class-synopsis)

```php
SplInt extends SplType {
    /* Constants */
    public const integer __default = 0;
    /* Methods */
    public function __construct ([ int $initial_value = 0 ])
    final public function &__invoke(): int
}
```

## [Predefined Constants](#Predefined-Constants)

**SplInt::__default**

## [Examples](#Examples)

### Example #1 SplInt usage example

```php
<?php
$int = new SplInt(94);

echo $int . PHP_EOL;
```

The above example will output:

> ```
> 94
> ```

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type
- [SplInt::__invoke] — Invoke object like a method

## [See Also](#See-Also)

- [`SplType`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[SplInt::__invoke]: ./SplInt.invoke.md#SplInt::__invoke
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
