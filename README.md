# SplTypes

[![Github Action Status](https://github.com/ducks-project/spl-types/actions/workflows/php.yml/badge.svg)](https://github.com/ducks-project/spl-types)
[![Coverage Status](https://coveralls.io/repos/github/ducks-project/spl-types/badge.svg)](https://coveralls.io/github/ducks-project/spl-types)
[![CircleCI](https://dl.circleci.com/status-badge/img/gh/ducks-project/spl-types/tree/7.x.svg?style=svg)](https://dl.circleci.com/status-badge/redirect/gh/ducks-project/spl-types/tree/master)

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/quality-score.png)](https://scrutinizer-ci.com/g/ducks-project/spl-types/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/coverage.png)](https://scrutinizer-ci.com/g/ducks-project/spl-types/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/build.png)](https://scrutinizer-ci.com/g/ducks-project/spl-types/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/ducks-project/spl-types/badges/code-intelligence.svg)](https://scrutinizer-ci.com/code-intelligence)
[![codecov Status](https://codecov.io/github/ducks-project/spl-types/graph/badge.svg?token=M3LBGQQ6N9)](https://codecov.io/github/ducks-project/spl-types)
[![Appveyor status](https://ci.appveyor.com/api/projects/status/edj2aj94ebslnhy9?svg=true)](https://ci.appveyor.com/project/donaldinou/spl-types)

[![Psalm Type Coverage](https://shepherd.dev/github/ducks-project/spl-types/coverage.svg)](https://shepherd.dev/github/ducks-project/spl-types)
[![Psalm Level](https://shepherd.dev/github/ducks-project/spl-types/level.svg)](https://shepherd.dev/github/ducks-project/spl-types)

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

[![CircleCI](https://dl.circleci.com/insights-snapshot/gh/ducks-project/spl-types/7.x/workflow/badge.svg?window=30d)](https://app.circleci.com/insights/github/ducks-project/spl-types/workflows/workflow/overview?branch=7.x&reporting-window=last-30-days&insights-snapshot=true)

## Description

This extension aims at helping people making PHP a stronger typed language and can be a good alternative to scalar type hinting. It provides different typehandling classes as such as integer, float, bool, enum and string

It provides classes unavailable if you can't install [SPL Types](http://php.net/manual/en/intro.spl-types.php) extension:
- [`SplType`]
- [`SplInt`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

## General information

Since [v7.0.0](./CHANGELOG.md#v700), breaking changes has appeared in relation to the pecl extension.
This is mainly due to the lack of maintenance and relevance of the original extension,
associated with the strong typing introduced in:
[php 7.4](https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.strict)
and the existence of [enums](https://www.php.net/manual/en/language.types.enumerations.php) since php 8.

## Glossary

- [Changelog]
- [Lexique]
- [Issues And Limitations]
- [How To]

## License

This library is released under the [MIT license].

[`SplType`]: /assets/documentation/classes/SplType.md
[`SplInt`]: /assets/documentation/classes/SplInt.md
[`SplFloat`]: /assets/documentation/classes/SplFloat.md
[`SplEnum`]: /assets/documentation/classes/SplEnum.md
[`SplBool`]: /assets/documentation/classes/SplBool.md
[`SplString`]: /assets/documentation/classes/SplString.md
[`SplUnitEnum`]: /assets/documentation/classes/SplUnitEnum.md
[`SplBackedEnum`]: /assets/documentation/classes/SplBackedEnum.md
[Lexique]: /assets/documentation/Lexique.md
[Issues And Limitations]: /assets/documentation/IssuesAndLimitations.md
[How To]: /assets/documentation/HowTo.md
[Changelog]: CHANGELOG.md
[MIT license]: LICENSE
