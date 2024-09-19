# [The SplInt class](#The-SplInt-class)

(PHP 5, PHP 7, PHP 8)
Check for [pecl SPL_Types]

## [Introduction](#Introduction)

The SplInt class is used to enforce strong typing of the integer type.

## [Class synopsis](#Class-synopsis)

```php
SplInt extends SplType {
    /* Constants */
    const integer __default = 0;
    /* Inherited methods */
    SplType::__construct ([ mixed $initial_value [, bool $strict ]] )
}
```

## [Predefined Constants](#Predefined-Constants)

**SplInt::__default**

## [Examples](#Examples)

### Example #1 SplInt usage example

```php
<?php
$int = new SplInt(94);

try {
    $int = 'Try to cast a string value for fun';
} catch (UnexpectedValueException $uve) {
    echo $uve->getMessage() . PHP_EOL;
}

echo $int . PHP_EOL;
```

The above example will output:

> ```
> Value not an integer
> 94
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
