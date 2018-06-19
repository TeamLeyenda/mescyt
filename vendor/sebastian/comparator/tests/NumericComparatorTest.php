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
 * @covers \SebastianBergmann\Comparator\NumericComparator
 *
<<<<<<< HEAD
 */
class NumericComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class NumericComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    /**
     * @var NumericComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new NumericComparator;
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(5, 10),
          array(8, '0'),
          array('10', 0),
          array(0x74c3b00c, 42),
          array(0755, 0777)
        );
=======
        return [
            [5, 10],
            [8, '0'],
            ['10', 0],
            [0x74c3b00c, 42],
            [0755, 0777]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array('5', '10'),
          array(8, 5.0),
          array(5.0, 8),
          array(10, null),
          array(false, 12)
        );
=======
        return [
            ['5', '10'],
            [8, 5.0],
            [5.0, 8],
            [10, null],
            [false, 12]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(1337, 1337),
          array('1337', 1337),
          array(0x539, 1337),
          array(02471, 1337),
          array(1337, 1338, 1),
          array('1337', 1340, 5),
        );
=======
        return [
            [1337, 1337],
            ['1337', 1337],
            [0x539, 1337],
            [02471, 1337],
            [1337, 1338, 1],
            ['1337', 1340, 5],
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(1337, 1338),
          array('1338', 1337),
          array(0x539, 1338),
          array(1337, 1339, 1),
          array('1337', 1340, 2),
        );
=======
        return [
            [1337, 1338],
            ['1338', 1337],
            [0x539, 1338],
            [1337, 1339, 1],
            ['1337', 1340, 2],
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
    public function testAssertEqualsSucceeds($expected, $actual, $delta = 0.0): void
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual, $delta);
        }

        catch (ComparisonFailure $exception) {
        }

        $this->assertNull($exception, 'Unexpected ComparisonFailure');
    }

    /**
     * @dataProvider assertEqualsFailsProvider
     */
    public function testAssertEqualsFails($expected, $actual, $delta = 0.0): void
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', 'matches expected'
        );
        $this->comparator->assertEquals($expected, $actual, $delta);
    }
}
