# [The SplEnum class](#The-SplEnum-class)

(PHP 7, PHP 8)

## [Introduction](#Introduction)

SplEnum gives the ability to emulate and create enumeration objects natively in PHP.

## [Class synopsis](#Class-synopsis)

```php
SplEnum extends SplType {
    /* Constants */
    public const NULL __default = null;
    /* Methods */
    public array getConstList ([ bool $include_default = false ])
    /* Inherited methods */
    SplType::__construct ([ mixed $initial_value = null [, bool $strict = true ]])
    SplType::__invoke__ ()
}
```

## [Predefined Constants](#Predefined-Constants)

**SplEnum::__default**

## [Examples](#Examples)

### Example #1 SplEnum usage example

```php
<?php
class Month extends SplEnum {
    const __default = self::January;

    const January = 1;
    const February = 2;
    const March = 3;
    const April = 4;
    const May = 5;
    const June = 6;
    const July = 7;
    const August = 8;
    const September = 9;
    const October = 10;
    const November = 11;
    const December = 12;
}

echo new Month(Month::June) . PHP_EOL;

try {
    new Month(13);
} catch (UnexpectedValueException $uve) {
    echo $uve->getMessage() . PHP_EOL;
}
```

The above example will output:

> ```
> 6
> Value not a const in enum Month
> ```

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type
- [SplType::__invoke] — Invoke object like a method
- [SplEnum::getConstList] — Returns all consts (possible values) as an array.

## [See Also](#See-Also)

- [`SplType`]
- [`SplInt`]
- [`SplFloat`]
- [`SplBool`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[SplType::__invoke]: ./SplType.__invoke.md#SplType::__invoke
[SplEnum::getConstList]: ./SplEnum.getConstList.md#SplEnum::getConstList
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
