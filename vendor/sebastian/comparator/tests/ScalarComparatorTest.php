<?php
/*
 * This file is part of the Comparator package.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace SebastianBergmann\Comparator;

/**
 * @covers \SebastianBergmann\Comparator\ScalarComparator
 *
<<<<<<< HEAD
 */
class ScalarComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class ScalarComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    /**
     * @var ScalarComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new ScalarComparator;
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array("string", "string"),
          array(new ClassWithToString, "string"),
          array("string", new ClassWithToString),
          array("string", null),
          array(false, "string"),
          array(false, true),
          array(null, false),
          array(null, null),
          array("10", 10),
          array("", false),
          array("1", true),
          array(1, true),
          array(0, false),
          array(0.1, "0.1")
        );
=======
        return [
            ['string', 'string'],
            [new ClassWithToString, 'string'],
            ['string', new ClassWithToString],
            ['string', null],
            [false, 'string'],
            [false, true],
            [null, false],
            [null, null],
            ['10', 10],
            ['', false],
            ['1', true],
            [1, true],
            [0, false],
            [0.1, '0.1']
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(array(), array()),
          array("string", array()),
          array(new ClassWithToString, new ClassWithToString),
          array(false, new ClassWithToString),
          array(tmpfile(), tmpfile())
        );
=======
        return [
            [[], []],
            ['string', []],
            [new ClassWithToString, new ClassWithToString],
            [false, new ClassWithToString],
            [\tmpfile(), \tmpfile()]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array("string", "string"),
          array(new ClassWithToString, new ClassWithToString),
          array("string representation", new ClassWithToString),
          array(new ClassWithToString, "string representation"),
          array("string", "STRING", true),
          array("STRING", "string", true),
          array("String Representation", new ClassWithToString, true),
          array(new ClassWithToString, "String Representation", true),
          array("10", 10),
          array("", false),
          array("1", true),
          array(1, true),
          array(0, false),
          array(0.1, "0.1"),
          array(false, null),
          array(false, false),
          array(true, true),
          array(null, null)
        );
=======
        return [
            ['string', 'string'],
            [new ClassWithToString, new ClassWithToString],
            ['string representation', new ClassWithToString],
            [new ClassWithToString, 'string representation'],
            ['string', 'STRING', true],
            ['STRING', 'string', true],
            ['String Representation', new ClassWithToString, true],
            [new ClassWithToString, 'String Representation', true],
            ['10', 10],
            ['', false],
            ['1', true],
            [1, true],
            [0, false],
            [0.1, '0.1'],
            [false, null],
            [false, false],
            [true, true],
            [null, null]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
        $stringException = 'Failed asserting that two strings are equal.';
        $otherException = 'matches expected';

<<<<<<< HEAD
        return array(
          array("string", "other string", $stringException),
          array("string", "STRING", $stringException),
          array("STRING", "string", $stringException),
          array("string", "other string", $stringException),
          // https://github.com/sebastianbergmann/phpunit/issues/1023
          array('9E6666666','9E7777777', $stringException),
          array(new ClassWithToString, "does not match", $otherException),
          array("does not match", new ClassWithToString, $otherException),
          array(0, 'Foobar', $otherException),
          array('Foobar', 0, $otherException),
          array("10", 25, $otherException),
          array("1", false, $otherException),
          array("", true, $otherException),
          array(false, true, $otherException),
          array(true, false, $otherException),
          array(null, true, $otherException),
          array(0, true, $otherException)
        );
=======
        return [
            ['string', 'other string', $stringException],
            ['string', 'STRING', $stringException],
            ['STRING', 'string', $stringException],
            ['string', 'other string', $stringException],
            // https://github.com/sebastianbergmann/phpunit/issues/1023
            ['9E6666666', '9E7777777', $stringException],
            [new ClassWithToString, 'does not match', $otherException],
            ['does not match', new ClassWithToString, $otherException],
            [0, 'Foobar', $otherException],
            ['Foobar', 0, $otherException],
            ['10', 25, $otherException],
            ['1', false, $otherException],
            ['', true, $otherException],
            [false, true, $otherException],
            [true, false, $otherException],
            [null, true, $otherException],
            [0, true, $otherException],
            ['0', '0.0', $stringException],
            ['0.', '0.0', $stringException],
            ['0e1', '0e2', $stringException],
            ["\n\n\n0.0", '                   0.', $stringException],
            ['0.0', '25e-10000', $stringException],
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    /**
     * @dataProvider acceptsSucceedsProvider
     */
    public function testAcceptsSucceeds($expected, $actual): void
    {
        $this->assertTrue(
          $this->comparator->accepts($expected, $actual)
        );
    }

    /**
     * @dataProvider acceptsFailsProvider
     */
    public function testAcceptsFails($expected, $actual): void
    {
        $this->assertFalse(
          $this->comparator->accepts($expected, $actual)
        );
    }

    /**
     * @dataProvider assertEqualsSucceedsProvider
     */
    public function testAssertEqualsSucceeds($expected, $actual, $ignoreCase = false): void
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual, 0.0, false, $ignoreCase);
        }

        catch (ComparisonFailure $exception) {
        }

        $this->assertNull($exception, 'Unexpected ComparisonFailure');
    }

    /**
     * @dataProvider assertEqualsFailsProvider
     */
    public function testAssertEqualsFails($expected, $actual, $message): void
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', $message
        );
        $this->comparator->assertEquals($expected, $actual);
    }
}
