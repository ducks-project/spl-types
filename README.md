# SplTypes

[![Github Action Status](https://github.com/ducks-project/spl-types/actions/workflows/php.yml/badge.svg)](https://github.com/ducks-project/spl-types)
[![Build Status](https://travis-ci.org/ducks-project/spl-types.svg)](https://travis-ci.org/ducks-project/spl-types)
[![Coverage Status](https://coveralls.io/repos/github/ducks-project/spl-types/badge.svg)](https://coveralls.io/github/ducks-project/spl-types)
[![CircleCI](https://dl.circleci.com/status-badge/img/gh/ducks-project/spl-types/tree/master.svg?style=svg)](https://dl.circleci.com/status-badge/redirect/gh/ducks-project/spl-types/tree/master)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ducks-project/spl-types/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/ducks-project/spl-types/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ducks-project/spl-types/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Psalm Type Coverage](https://shepherd.dev/github/ducks-project/spl-types/coverage.svg)](https://shepherd.dev/github/ducks-project/spl-types)
[![codecov Status](https://codecov.io/github/ducks-project/spl-types/graph/badge.svg?token=M3LBGQQ6N9)](https://codecov.io/github/ducks-project/spl-types)
[![Appveyor status](https://ci.appveyor.com/api/projects/status/edj2aj94ebslnhy9?svg=true)](https://ci.appveyor.com/project/donaldinou/spl-types)

[![License](https://poser.pugx.org/ducks-project/spl-types/license)](https://packagist.org/packages/ducks-project/spl-types)
[![Latest Stable Version](https://poser.pugx.org/ducks-project/spl-types/v/stable)](https://packagist.org/packages/ducks-project/spl-types)
[![PHP Version Require](https://poser.pugx.org/ducks-project/spl-types/require/php)](https://packagist.org/packages/ducks-project/spl-types)

[![Total Downloads](https://poser.pugx.org/ducks-project/spl-types/downloads)](https://packagist.org/packages/ducks-project/spl-types)
[![Monthly Downloads](https://poser.pugx.org/ducks-project/spl-types/d/monthly)](https://packagist.org/packages/ducks-project/spl-types)
[![Daily Downloads](https://poser.pugx.org/ducks-project/spl-types/d/daily)](https://packagist.org/packages/ducks-project/spl-types)

[![Duck's Validated](https://img.shields.io/badge/duck-validated-lightyellow)](https://opencollective.com/ducks-project)
[![Packagist online](https://img.shields.io/badge/packagist-online-brightgreen)](https://opencollective.com/ducks-project)
[![Documentation Status](https://readthedocs.org/projects/spl-types/badge/?version=latest)](https://spl-types.readthedocs.io/en/latest/?badge=latest)

[![Contributor Covenant](https://img.shields.io/badge/Contributor%20Covenant-2.1-4baaaa.svg)](code_of_conduct.md)

* Project page: https://github.com/ducks-project/spl-types
* Repository: https://github.com/ducks-project/spl-types
* Original PHP extension: http://php.net/manual/en/intro.spl-types.php

[![CircleCI](https://dl.circleci.com/insights-snapshot/gh/ducks-project/spl-types/master/workflow/badge.svg?window=30d)](https://app.circleci.com/insights/github/ducks-project/spl-types/workflows/workflow/overview?branch=master&reporting-window=last-30-days&insights-snapshot=true)

## Description

This extension aims at helping people making PHP a stronger typed language and can be a good alternative to scalar type hinting. It provides different typehandling classes as such as integer, float, bool, enum and string

It provides classes unavailable if you can't install [SPL Types](http://php.net/manual/en/intro.spl-types.php) extension:
- [`SplType`]
- [`SplInt`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

## Known Issues & Limitations

### SplTypes

Because limitations of PHP it is impossible to directly reaffect Spl variables like the original extension.
For example:

```php
<?php
// With Spl Extension.
$int = new \SplInt();
$int = 'test'; // Exception.

// With Spl Plyfill.
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

// With Spl Plyfill.
$test = 10;
$string = new \SplInt($test);
if ($test === $string) { // Cast Error.
    echo 'OK';
}
```

### SplInt & Splfloat

Because of PHP behaviors you can't easily do operations like:

```php
<?php
$int = new \SplInt();
$int++; // Exception.

$int + 10; // Exception.
```

Unfortunately, you need to do like below:

```php
<?php
$int = new \SplInt();

$result = (int) (string) $int + 10; // Shame...
```

### SplEnum

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

### SplBool

Like it was explain above, the \SplBool object isn't a strict boolean so take care about your equality test.

```php
<?php
$bool = new \SplBool(false);
if ($bool) {
    echo 'This is true'; // Object is not null so it pass test...
}
```

## License

This library is released under the [MIT license].

[`SplType`]: /assets/documentation/SplType.md
[`SplInt`]: /assets/documentation/SplInt.md
[`SplFloat`]: /assets/documentation/SplFloat.md
[`SplEnum`]: /assets/documentation/SplEnum.md
[`SplBool`]: /assets/documentation/SplBool.md
[`SplString`]: /assets/documentation/SplString.md
[MIT license]: LICENSE
