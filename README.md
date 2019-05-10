# SplTypes

[![Build Status](https://travis-ci.org/ducks-project/spl-types.svg)](https://travis-ci.org/ducks-project/spl-types)

* Project page: https://github.com/ducks-project/spl-types
* Repository: https://github.com/ducks-project/spl-types
* Original PHP extension: http://php.net/manual/en/intro.spl-types.php

## Description

This extension aims at helping people making PHP a stronger typed language and can be a good alternative to scalar type hinting. It provides different typehandling classes as such as integer, float, bool, enum and string

It provides classes unavailable if you can't install [SPL Types](http://php.net/manual/en/intro.spl-types.php) extension:
- [`SplType`](http://php.net/manual/en/class.spltype.php)
- [`SplInt`](http://php.net/manual/en/class.splint.php)
- [`SplFloat`](http://php.net/manual/en/class.splfloat.php)
- [`SplEnum`](http://php.net/manual/en/class.splenum.php)
- [`SplBool`](http://php.net/manual/en/class.splbool.php)
- [`SplString`](http://php.net/manual/en/class.splstring.php)

## Known Issues & Limitations

### SplTypes

Because limitations of PHP it is impossible to directly reaffect Spl variables like the original extension.
For example:

```
// With Spl Extension.
$int = new \SplInt();
$int = 'test'; // Exception.

// With Spl Plyfill.
$int = new \SplInt();
$int = 'test'; // Just unset Object and affect 'test' to $int variable.
```

In the same way, Spl_Types polyfill is not really strict typing the extension. So, the code below is not "correct".

```
// With Spl Extension.
$test = 10;
$value = new \SplInt($test);
if ($test == $value) {
    echo 'OK';
}

// With Spl Plyfill.
$test = 10;
$string = new \SplInt($test);
if ($test === $string) { // Cast Error.
    echo 'OK';
}
```

### SplInt & Splfloat

Because of PHP behaviors you can't easily do operations like:

```
$int = new \SplInt();
$int++; // Exception.

$int + 10; // Exception.
```

Unfortunately, you need to do like below:

```
$int = new \SplInt();

$result = (int) (string) $int + 10; // Shame...
```

### SplEnum

As it was said, you need to manually cast your object to string in order to make comparison.

```
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

### SplBool

Like it was explain above, the \SplBool object isn't a strict boolean so take care about your equality test.

```
$bool = new \SplBool(false);
if ($bool) {
    echo 'This is true'; // Object is not null so it pass test...
}
```

## License

This library is released under the [MIT license](LICENSE).
