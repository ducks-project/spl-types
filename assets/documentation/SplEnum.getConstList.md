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

[`SplType`]: /assets/documentations/SplType.md
[`SplInt`]: /assets/documentations/SplInt.md
[`SplFloat`]: /assets/documentations/SplFloat.md
[`SplEnum`]: /assets/documentations/SplEnum.md
[`SplBool`]: /assets/documentations/SplBool.md
[`SplString`]: /assets/documentations/SplString.md
