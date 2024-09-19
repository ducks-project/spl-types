# How To

## Do Math

```php
<?php
$int = new \SplInt(10);
$value = &$int();
$value++;

echo 'SplInt value is ' . $int();
```

The above example will output:

> ```
> SplInt value is : 11
> ```

## Concatenate

```php
<?php
$string = new \SplString('hello ');
$value = &$string();
$value .= 'world';

echo 'SplString value is ' . $string();
```

The above example will output:

> ```
> SplString value is : hello world
> ```
