<?php

use Pest\Exceptions\InvalidPestCommand;
use Pest\TestSuite;
use Tests\TestCase;

// PestはRunInSeparateProcessに対応していないため、InvalidPestCommandをキャッチした場合は早期リターンする
try {
    TestSuite::getInstance();
} catch (InvalidPestCommand) {
    return;
}

pest()->extend(TestCase::class)
    ->in('Browser');
