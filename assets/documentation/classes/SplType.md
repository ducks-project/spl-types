# [The SplType class](#The-SplType-class)

(PHP 5, PHP 7, PHP 8)
Check for [pecl SPL_Types]

## [Introduction](#Introduction)

Parent class for all SPL types.

## [Class synopsis](#Class-synopsis)

```php
abstract SplType {
    /* Constants */
    public const NULL __default = NULL ;
    /* Methods */
    __construct ([ mixed $initial_value = null [, bool $strict = true ]])
}
```

## [Predefined Constants](#Predefined-Constants)

**SplType::__default**

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type
- [SplType::__invoke] — Invoke object like a method

## [See Also](#See-Also)

- [`SplInt`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[SplType::__invoke]: ./SplType.invoke.md#SplType::__invoke
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
