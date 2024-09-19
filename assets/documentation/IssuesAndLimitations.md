# Known Issues & Limitations

## SplTypes

Because limitations of PHP it is impossible to directly reaffect Spl variables like the original extension.
For example:

```php
<?php
// With Spl Extension.
$int = new \SplInt();
$int = 'test'; // Exception.

// With Spl Polyfill.
$int = new \SplInt();
$int = 'test'; // Just unset Object and affect 'test' to $int variable.
```

In the same way, Spl_Types polyfill is not really strict typing the extension. So, the code below is not "correct".

```php
<?php
// With Spl Extension.
$test = 10;
$value = new \SplInt($test);
if ($test == $value) {
    echo 'OK';
}

// With Spl Polyfill.
$test = 10;
$string = new \SplInt($test);
if ($test === $string) { // Cast Error.
    echo 'OK';
}
```

## SplInt & Splfloat

Because of PHP behaviors you can't easily do operations like:

```php
<?php
$int = new \SplInt();
$int++; // Exception.

$int + 10; // Exception.
```

> **Note:** You could use implicite `__invoke` from class in order to cast and get internal value for equivalence test.
> ```php
> <?php
> $test = 10;
> $value = new \SplInt($test);
> if ($test == $value()) {
>     echo 'OK';
> }

> **Note:** Unfortunately, you could also use magic `__toString` and do like below:
> ```php
> <?php
> $int = new \SplInt();
> $result = (int) (string) $int + 10; // Shame...
> ```

## SplEnum

As it was said, you need to manually cast your object to string in order to make comparison.

```php
<?php
class Month extends \SplEnum {
    const __default = self::January;
    const January = 1;
    // ...
}
$enum = new Month();

// WARNING : Object of class Month could not be converted to int...
if (Month::January == $enum) {
    // KO ...
}

// But,
if (Month::January == (string) $enum) {
    // ... OK
}
```

## SplBool

Like it was explain above, the \SplBool object isn't a strict boolean so take care about your equality test.

```php
<?php
$bool = new \SplBool(false);
if ($bool) {
    echo 'This is true'; // Object is not null so it pass test...
}
```
