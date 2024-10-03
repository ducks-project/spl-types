<?php

/**
 * Part of SplTypes package.
 *
 * (c) Adrien Loyant <donald_duck@team-df.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ducks\Component\SplTypes;

/**
 * Trait used for magic accessor on SplEnum class
 *
 * @template T
 *
 * @phpstan-require-extends SplEnum
 *
 * @psalm-api
 */
trait SplEnumAccessorsTrait
{
    /**
     * Return the case-sensitive name of the case class itself.
     *
     * @param string $name
     *
     * @return mixed
     *
     * @phpstan-return T|null
     */
    final public function __get(string $name)
    {
        switch ($name) {
            case 'name':
                $result = \array_search($this->__default, $this->getConstList());
                break;

            case 'value':
                $result = $this->__default;
                break;

            default:
                \trigger_error('Undefined property: ' . static::class . '::$' . $name, E_USER_WARNING);
                break;
        }

        return $result ?? null;
    }

    /**
     * Writing data to inaccessible (protected or private) or non-existing properties.
     *
     * @throws \Error
     *
     * @psalm-suppress MissingParamType
     *
     * @phpstan-ignore-next-line
     */
    final public function __set(string $name, $value): void
    {
        // Fast return
        if ('name' === $name || 'value' === $name) {
            throw new \Error('Cannot modify readonly property ' . static::class . '::$' . $name);
        }

        throw new \Error('Cannot create dynamic property ' . static::class . '::$' . $name);
    }

    /**
     * Triggered by calling isset() or empty() on inaccessible or non-existing properties.
     *
     * @param string $name
     *
     * @return bool
     */
    final public function __isset(string $name): bool
    {
        switch ($name) {
            case 'name':
            case 'value':
                $result = true;
                break;

            default:
                $result = isset($this->$name);
                break;
        }

        return $result;
    }

    /**
     * Invoked when unset() is used on inaccessible or non-existing properties.
     *
     * @param string $name
     *
     * @return void
     */
    final public function __unset(string $name): void
    {
        // Fast return
        if (!\in_array($name, ['name', 'value'])) {
            return;
        }

        throw new \Error('Cannot unset readonly property ' . static::class . '::$' . $name);
    }
}
