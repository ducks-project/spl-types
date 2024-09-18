# [The SplType class](#The-SplType-class)

(PHP 5, PHP 7, PHP 8)
Check for [pecl SPL_Types]

## [Introduction](#Introduction)

Parent class for all SPL types.

## [Class synopsis](#Class-synopsis)

```php
abstract SplType {
    /* Constants */
    const NULL __default = NULL ;
    /* Methods */
    __construct ([ mixed $initial_value [, bool $strict ]] )
}
```

## [Predefined Constants](#Predefined-Constants)

**SplType::__default**

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type

## [See Also](#See-Also)

- [`SplInt`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentations/SplType.md
[`SplInt`]: /assets/documentations/SplInt.md
[`SplFloat`]: /assets/documentations/SplFloat.md
[`SplEnum`]: /assets/documentations/SplEnum.md
[`SplBool`]: /assets/documentations/SplBool.md
[`SplString`]: /assets/documentations/SplString.md
