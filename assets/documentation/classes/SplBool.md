# [The SplBool class](#The-SplBool-class)

(PHP 7, PHP 8)

## [Introduction](#Introduction)

The SplBool class is used to enforce strong typing of the bool type.

## [Class synopsis](#Class-synopsis)

```php
SplBool extends SplEnum {
    /* Constants */
    public const boolean __default = false;
    public const boolean false = false;
    public const boolean true = true;
    /* Methods */
    public function __construct ([ bool $initial_value = false ])
    final public function &__invoke(): bool
    /* Inherited methods */
    public array SplEnum::getConstList ([ bool $include_default = false ])
}
```

## [Predefined Constants](#Predefined-Constants)

**SplBool::__default**

**SplBool::false**

**SplBool::true**

## [Examples](#Examples)

### Example #1 SplBool usage example

```php
<?php
$true = new SplBool(true);
if ($true()) {
    echo "TRUE\n";
}

$false = new SplBool;
if ($false) {
    echo "FALSE\n";
}
```

The above example will output:

> ```
> TRUE
> ```

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type
- [SplEnum::getConstList] — Returns all consts (possible values) as an array.
- [SplBool::__invoke] — Invoke object like a method

## [See Also](#See-Also)

- [`SplType`]
- [`SplInt`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplString`]

[SplType::__construct]: ./SplType.construct.md#SplType::__construct
[SplEnum::getConstList]: ./SplType.getConstList.md#SplEnum::getConstList
[SplBool::__invoke]: ./SplType.getConstList.md#SplBool::__invoke
[pecl SPL_Types]:https://pecl.php.net/package/SPL_Types
[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
