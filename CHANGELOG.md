# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- Stringable interface
- JsonSerializable capability
- `name` case property for SplEnum like [Basic enumerations]
- `value` property available for SplEnum like [Backed enumerations]
- Dynamic static creation of SplEnum object with magic `__callStatic`.

### Changed

- **BREAKING CHANGE**:
  Now ext-json php library is mandatory because extension is always enable in php>=8
- **BREAKING CHANGE**:
  `__default` constant from `SplTypes` and derivated not public anymore.

## <a name="v700"></a>[7.0.0] - 2024-09-18

### Added

- migrate to php 7.4
- CHANGELOG.md
- Add both [pecl SPL_Types] [documentation](/assets/documentation/pecl/SplType.md)
- Add `__invoke` magic method in order to do operation on `object`

### Fixed

- Bad links on documentation
- Bad styleci

### Changed

- use `declare(strict_types=1);` for all files
- [SplType::__construct] now run a fatal error if incompatible type is given.

### Removed

- atoum test
- **BREAKING CHANGE**:
  `$strict` is now removed from [`SplString`], [`SplBool`], [`SplInt`], [`SplFloat`]
  You could backward compatibility with `declare(strict_types=0);` from your files.
  More information: [Strict typing.](https://www.php.net/manual/en/language.types.declarations.php#language.types.declarations.strict)

## <a name="v601"></a>[6.0.1] - 2024-09-18

### Deprecated

- Deprecation for `$strict` arg on [`SplString`], [`SplBool`], [`SplInt`], [`SplFloat`] classes.

## <a name="v600"></a>[6.0.0] - 2024-09-18

### Added

- migrate to php 7.3

## <a name="v500"></a>[5.0.0] - 2024-09-18

### Added

- migrate to php 7.2

## <a name="v400"></a>[4.0.0] - 2024-09-18

### Added

- migrate to php 7.1

## <a name="v300"></a>[3.0.0] - 2024-09-18

### Added

- migrate to php 7.0

## <a name="v200"></a>[2.0.0] - 2024-09-18

### Added

- migrate to php 5.4

## <a name="v130"></a>[1.3.0] - 2024-09-17

### Added

- remote ci/cd
- bench script

### Changed

- README.
- update composer

## <a name="v120"></a>[1.2.0] - 2020-11-25

### Added

- Unit tests.
- first ci/cd

### Changed

- gitignore.
- `$initial_value` now always defined

### Fixed

- `$strict` now as boolean

## <a name="v110"></a>[1.1.0] - 2019-03-06

### Added

- Polyfill (bootstrap).

### Changed

- Change files structures.

## <a name="v100"></a>[1.0.0] - 2015-10-25

### Added

- [`SplType`]
- [`SplInt`]
- [`SplFloat`]
- [`SplEnum`]
- [`SplBool`]
- [`SplString`]

[`SplType`]: /assets/documentation/classes/SplType.md
[`SplInt`]: /assets/documentation/classes/SplInt.md
[`SplFloat`]: /assets/documentation/classes/SplFloat.md
[`SplEnum`]: /assets/documentation/classes/SplEnum.md
[`SplBool`]: /assets/documentation/classes/SplBool.md
[`SplString`]: /assets/documentation/classes/SplString.md
[SplType::__construct]: /assets/documentation/classes/SplType.construct.md#SplType::__construct
[pecl SPL_Types]: https://pecl.php.net/package/SPL_Types
[Basic enumerations]: https://www.php.net/manual/en/language.enumerations.basics.php
[Backed enumerations]: https://www.php.net/manual/en/language.enumerations.backed.php
[unreleased]: https://github.com/ducks-project/spl-types/compare/v7.0.0...HEAD
[7.0.0]: https://github.com/ducks-project/spl-types/compare/v6.0.1...v7.0.0
[6.0.1]: https://github.com/ducks-project/spl-types/compare/v6.0.0...v6.0.1
[6.0.0]: https://github.com/ducks-project/spl-types/compare/v5.0.0...v6.0.0
[5.0.0]: https://github.com/ducks-project/spl-types/compare/v4.0.0...v5.0.0
[4.0.0]: https://github.com/ducks-project/spl-types/compare/v3.0.0...v4.0.0
[3.0.0]: https://github.com/ducks-project/spl-types/compare/v2.0.0...v3.0.0
[2.0.0]: https://github.com/ducks-project/spl-types/compare/v1.3.0...v2.0.0
[1.3.0]: https://github.com/ducks-project/spl-types/compare/v1.2.0...v1.3.0
[1.2.0]: https://github.com/ducks-project/spl-types/compare/v1.1.0...v1.2.0
[1.1.0]: https://github.com/ducks-project/spl-types/compare/v1.0.0...v1.1.0
[1.0.0]: https://github.com/ducks-project/spl-types/releases/tag/v1.0.0
