<?php
namespace NumbersPHP\Tests;

use NumbersPHP\Complex;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-25 at 10:53:09.
 */
class ComplexTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Complex
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        //$this->object = new Complex;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers NumbersPHP\Complex::__toString
     */
    public function test__toString()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $this->assertEquals('Complex(3, 4)', $a->__toString());
    }

    /**
     * @covers NumbersPHP\Complex::add
     */
    public function testAdd()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $b = new \NumbersPHP\Complex(5, 6);
        $result = $a->add($b);
        $this->assertEquals(8, $result->getReal());
        $this->assertEquals(10, $result->getImaginary());
        $this->assertEquals(5, $a->magnitude());
        $this->assertTrue(
            $a->phase() - \NumbersPHP\Numbers::EPSILON < 0.9272952180016122 &&
            0.9272952180016122 < $a->phase() + \NumbersPHP\Numbers::EPSILON
        );
    }

    /**
     * @covers NumbersPHP\Complex::subtract
     */
    public function testSubtract()
    {
        $a = new \NumbersPHP\Complex(5, 8);
        $b = new \NumbersPHP\Complex(3, 4);
        $result = $a->subtract($b);
        $this->assertEquals(2, $result->getReal());
        $this->assertEquals(4, $result->getImaginary());

    }

    /**
     * @covers NumbersPHP\Complex::multiply
     */
    public function testMultiply()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $b = new \NumbersPHP\Complex(5, 6);
        $result = $a->multiply($b);
        $this->assertEquals(-9, $result->getReal());

        $this->assertEquals(38, $result->getImaginary());
    }

    /**
     * @covers NumbersPHP\Complex::divide
     */
    public function testDivide()
    {
        $a = new \NumbersPHP\Complex(10, 0);
        $b = new \NumbersPHP\Complex(0, 10);
        $result = $a->divide($b);
        $this->assertEquals(0, $result->getReal());
        $this->assertEquals(-1, $result->getImaginary());
    }

    /**
     * @covers NumbersPHP\Complex::magnitude
     */
    public function testMagnitude()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $this->assertEquals(5, $a->magnitude());
    }

    /**
     * @covers NumbersPHP\Complex::phase
     */
    public function testPhase()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $this->assertTrue(
            \NumbersPHP\Basic::numbersEqual($a->phase(), 0.9272952180016122, \NumbersPHP\Numbers::EPSILON)
        );
    }

    /**
     * @covers NumbersPHP\Complex::conjugate
     */
    public function testConjugate()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $b = $a->conjugate();
        $this->assertEquals(3, $b->getReal());
        $this->assertEquals(-4, $b->getImaginary());
    }

    /**
     * @covers NumbersPHP\Complex::pow
     */
    public function testPow()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $imaginary = new \NumbersPHP\Complex(0, 4);
        $negativeImaginary = new \NumbersPHP\Complex(0, -4);
        $this->assertTrue($a->pow(1/2)->equals(new \NumbersPHP\Complex(2, 1), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue($a->pow(1/4)->equals(new \NumbersPHP\Complex(1.455, 0.343), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue($a->pow(0)->equals(new \NumbersPHP\Complex(1, 0), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue($a->pow(2)->equals(new \NumbersPHP\Complex(-7, 24), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue($a->pow(5)->equals(new \NumbersPHP\Complex(-237, -3116), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue($imaginary->pow(2)->equals(new \NumbersPHP\Complex(-16, 0), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue(
            $negativeImaginary->pow(-2)->equals(new \NumbersPHP\Complex(-1/16, 0), \NumbersPHP\Numbers::EPSILON)
        );

    }

    /**
     * @covers NumbersPHP\Complex::complexPow
     */
    public function testComplexPow()
    {
        $a = new \NumbersPHP\Complex(0, 1);
        $b = new \NumbersPHP\Complex(0, -1);
        $this->assertTrue(
            $a->complexPow($b)->equals(new \NumbersPHP\Complex(4.81047, 0), \NumbersPHP\Numbers::EPSILON)
        );

        $c = new \NumbersPHP\Complex(3, 4);
        $d = new \NumbersPHP\Complex(1, 2);
        $this->assertTrue(
            $c->complexPow($d)->equals(new \NumbersPHP\Complex(-0.4198, -0.66), \NumbersPHP\Numbers::EPSILON)
        );
    }

    /**
     * @covers NumbersPHP\Complex::roots
     */
    public function testRoots()
    {
        $a = new \NumbersPHP\Complex(3, -4);
        $root = 5;
        $roots = $a->roots($root);
        $this->assertEquals($root, count($roots));

        for ($i = 0; $i < $root; ++$i) {
            $this->assertTrue($roots[$i]->pow($root)->equals($a, \NumbersPHP\Numbers::EPSILON));
        }
    }

    /**
     * @covers NumbersPHP\Complex::sin
     */
    public function testSin()
    {
        $a = new \NumbersPHP\Complex(3, -4);
        $this->assertTrue(
            $a->sin()->equals(new \NumbersPHP\Complex(3.8537, 27.0168), \NumbersPHP\Numbers::EPSILON)
        );
    }

    /**
     * @covers NumbersPHP\Complex::cos
     */
    public function testCos()
    {
        $a = new \NumbersPHP\Complex(3, -4);
        $this->assertTrue(
            $a->cos()->equals(new \NumbersPHP\Complex(-27.0349, 3.8511), \NumbersPHP\Numbers::EPSILON)
        );
    }

    /**
     * @covers NumbersPHP\Complex::tan
     */
    public function testTan()
    {
        $a = new \NumbersPHP\Complex(3, -4);
        $expected = $a->sin()->divide($a->cos());
        $this->assertTrue($a->tan()->equals($expected, \NumbersPHP\Numbers::EPSILON));
    }

    /**
     * @covers NumbersPHP\Complex::equals
     */
    public function testEquals()
    {
        $a = new \NumbersPHP\Complex(3, 4);
        $this->assertTrue($a->equals(new \NumbersPHP\Complex(3, 4), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue($a->equals(new \NumbersPHP\Complex(3, 4.0001), \NumbersPHP\Numbers::EPSILON));

        $this->assertTrue($a->equals(new \NumbersPHP\Complex(3.0001, 4), \NumbersPHP\Numbers::EPSILON));

        $this->assertFalse($a->equals(new \NumbersPHP\Complex(3.1, 4), \NumbersPHP\Numbers::EPSILON));

        $this->assertFalse($a->equals(new \NumbersPHP\Complex(3, 4.1), \NumbersPHP\Numbers::EPSILON));

        $this->assertFalse($a->equals(new \NumbersPHP\Complex(5, 4), \NumbersPHP\Numbers::EPSILON));

    }
}
