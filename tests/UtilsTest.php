<?php

namespace Hexlet\Phpunit\Tests;

use PHPUnit\Framework\TestCase;
use function Hexlet\Phpunit\Utils\reverseString;

class UtilsTest extends TestCase
{
    public function testReverse(): void
    {
        $this->assertEquals('', reverseString(''));
        $this->assertEquals('olleh', reverseString('hello'));
    }

    public function testReverseLongText(): void
    {
        $testText = file_get_contents($this->getFixtureFullPath('test.txt'));
        $resultText = reverseString($testText);
        $pathToExpectedText = $this->getFixtureFullPath('expected.txt');
        $this->assertStringEqualsFile($pathToExpectedText, $resultText);
    }

    public function getFixtureFullPath($fixtureName)
    {
        $parts = [__DIR__, 'fixtures', $fixtureName];
        return realpath(implode('/', $parts));
    }
}
