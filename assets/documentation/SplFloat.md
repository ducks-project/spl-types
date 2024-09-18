# [The SplFloat class](#The-SplFloat-class)

(PHP 5, PHP 7, PHP 8)
Check for [pecl SPL_Types]

## [Introduction](#Introduction)

The SplFloat class is used to enforce strong typing of the float type.

## [Class synopsis](#Class-synopsis)

```php
SplFloat extends SplType {
    /* Constants */
    const float __default = 0;
    /* Inherited methods */
    SplType::__construct ([ mixed $initial_value [, bool $strict ]] )
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

try {
    $float = 'Try to cast a string value for fun';
} catch (UnexpectedValueException $uve) {
    echo $uve->getMessage() . PHP_EOL;
}

echo $float . PHP_EOL;
echo $newFloat . PHP_EOL;
```

The above example will output:

> ```
> Value not a float
> 3.154
> 3
> ```

## [Table of Contents](#Table-of-Contents)

- [SplType::__construct] — Creates a new value of some type

## [See Also](#See-Also)

- [`SplType`]
- [`SplInt`]
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
