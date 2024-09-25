# [The SplBackedEnum interface](#The-SplBackedEnum-interface)

(PHP 7, PHP 8)

## [Introduction](#Introduction)

Interface used in order to implements \BackedEnum one.

## [Interface synopsis](#Interface-synopsis)

```php
interface SplBackedEnum extends BackedEnum {
    /* Inherited methods */
    public static BackedEnum::from(int|string $value): static
    public static BackedEnum::tryFrom(int|string $value): ?static
    public static UnitEnum::cases(): array
}
```

## [Table of Contents](#Table-of-Contents)

- [UnitEnum::cases] — Generates a list of cases on an enum
- [BackedEnum::from] — Maps a scalar to an enum instance or null
- [BackedEnum::tryFrom] — Maps a scalar to an enum instance or null

[UnitEnum::cases]: https://www.php.net/manual/en/unitenum.cases.php
[BackedEnum::from]: https://www.php.net/manual/en/backedenum.from.php
[BackedEnum::tryFrom]: https://www.php.net/manual/en/backedenum.tryfrom.php
