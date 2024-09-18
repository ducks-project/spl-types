# [SplEnum::getConstList](#SplEnum::getConstList)

(PHP 5, PHP 7, PHP 8)
SplEnum::getConstList — Returns all consts (possible values) as an array.

## [Description](#Description)

```php
public array SplEnum::getConstList ([ bool $include_default = false ] )
```

## [Parameters](#Parameters)

### [include_default](#include_default)
Whether to include __default property.

## [Return Values](#Return-Values)

An array of all possible values

## [Examples](#Examples)

### Example #1 SplEnum::getConstList() example

```php
<?php
$bool = new SplBool;
var_dump($bool->getConstList(true));
```

The above example will output:

> ```
> array(3) {
>     ["__default"] => bool(false)
>     ["false"] => bool(false)
>     ["true"] => bool(true)
> }
> ```

## [Notes](#Notes)

> **Note:** Nothing to report yet

## [See Also](#See-Also)

- [`SplType`]
- [`SplInt`]
- [`SplFloat`]
- [`SplBool`]
- [`SplString`]

[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
