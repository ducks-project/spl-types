<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedConstructorParamRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\Set\ValueObject\SetList;

return RectorConfig::configure()
    // ->withPhpSets()
    // ->withRules([
    //     TypedPropertyFromStrictConstructorRector::class
    // ])
    ->withSkip([
        __DIR__ . '/assets/*',
        __DIR__ . '/Resources/stubs/*',
        __DIR__ . '/Tests/*',
        __DIR__ . '/vendor/*',
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
        RemoveUnusedConstructorParamRector::class,
    ])
    // here we can define, what prepared sets of rules will be applied
    ->withPreparedSets(
        /** deadCode: */
        true,
        /**codeQuality: */
        true
    )
    ->withSets([
        SetList::PHP_74
    ])
    ->withTypeCoverageLevel(0);
