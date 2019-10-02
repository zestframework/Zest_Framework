<?php

namespace Framework\Tests;

use PHPUnit\Framework\TestCase;
use Zest\Data\Str;

class StrTest extends TestCase
{
    public function testReverse()
    {
        $this->assertSame('olleh', Str::reverse('hello'));
        $this->assertNotSame('hello', Str::reverse('hello'));
    }

    public function testConcat()
    {
        $this->assertSame('this  is  a  book', Str::concat(' ', 'this', ' is', ' a', ' book'));
        $this->assertNotSame('thisisabook', Str::concat(' ', 'this', ' is', ' a', ' book'));
    }

    public function testCount()
    {
        $this->assertSame(5, Str::count('hello'));
        $this->assertNotSame(9, Str::count('hello'));
    }

    public function testHasUpperCase()
    {
        $this->assertFalse(Str::hasUpperCase('camel'));
        $this->assertTrue(Str::hasUpperCase('Uppercase'));
        $this->assertTrue(Str::hasUpperCase('uppercase in a String'));
        $this->assertTrue(Str::hasUpperCase('Éé'));
    }

    public function testHasLowerCase()
    {
        $this->assertFalse(Str::hasLowerCase('CAMEL'));
        $this->assertTrue(Str::hasLowerCase('lowercase'));
        $this->assertTrue(Str::hasLowerCase('lowercase in STRING'));
        $this->assertTrue(Str::hasLowerCase('iou'));
    }

    public function testConvertCase()
    {
        $this->assertSame('AAaaĄaśćŻŹ', Str::ConvertCase('aaAAąAŚĆżź', 'UTF-8'));
        $this->assertSame('camel', Str::ConvertCase('CAMEL', 'UTF-8'));
        $this->assertSame('UPPERcase', Str::ConvertCase('upperCASE', 'UTF-8'));
        $this->assertSame('LOWERCASE IN string', Str::ConvertCase('lowercase in STRING', 'UTF-8'));
    }

    public function testisBase64()
    {
        $this->assertFalse(Str::isBase64('4rdHFh%2BHYoS8oLdVvbUzEVqB8Lvm7kSPnuwF0AAABYQ%3D'));
        $this->assertTrue(Str::isBase64('YW1vdXJmYXlh'));
    }

    public function testSubstring()
    {
        $this->assertSame('Amourfaya', Str::substring('Amourfaya', 0));
        $this->assertNotSame('Amourfaya', Str::substring('Amourfaya', 2, 4));
        $this->assertSame('ourf', Str::substring('Amourfaya', 2, 4));
    }

    public function testStripWhitespaces()
    {
        $this->assertSame('This string is stripped', Str::stripWhitespaces(' This string is stripped '));
        $this->assertNotSame(' This string is stripped ', Str::stripWhitespaces(' This string is stripped '));
    }

    public function testRepeat()
    {
        $this->assertSame('--', Str::repeat('--', 1));
        $this->assertNotSame('--', Str::repeat('--', 3));
        $this->assertSame('-=--=--=--=--=-', Str::repeat('-=-', 5));
    }

    public function testSlice()
    {
        $this->assertFalse(Str::slice('String', -3, -10));
        $this->assertSame(
            'The apple does not fall far from the tree',
            Str::slice('The apple does not fall far from the tree', 0)
        );
        $this->assertSame(
            'The apple does',
            Str::slice('The apple does not fall far from the tree', 0, 14)
        );
        $this->assertSame(
            'tree',
            Str::slice('The apple does not fall far from the tree', -4)
        );
        $this->assertNotSame('good shit', Str::slice('This is good shit', 8, 2));
    }
}
