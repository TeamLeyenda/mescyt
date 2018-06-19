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
 * @covers \SebastianBergmann\Comparator\DoubleComparator
 *
<<<<<<< HEAD
 */
class DoubleComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class DoubleComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    /**
     * @var DoubleComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new DoubleComparator;
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(0, 5.0),
          array(5.0, 0),
          array('5', 4.5),
          array(1.2e3, 7E-10),
          array(3, acos(8)),
          array(acos(8), 3),
          array(acos(8), acos(8))
        );
=======
        return [
            [0, 5.0],
            [5.0, 0],
            ['5', 4.5],
            [1.2e3, 7E-10],
            [3, \acos(8)],
            [\acos(8), 3],
            [\acos(8), \acos(8)]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(5, 5),
          array('4.5', 5),
          array(0x539, 02471),
          array(5.0, false),
          array(null, 5.0)
        );
=======
        return [
            [5, 5],
            ['4.5', 5],
            [0x539, 02471],
            [5.0, false],
            [null, 5.0]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(2.3, 2.3),
          array('2.3', 2.3),
          array(5.0, 5),
          array(5, 5.0),
          array(5.0, '5'),
          array(1.2e3, 1200),
          array(2.3, 2.5, 0.5),
          array(3, 3.05, 0.05),
          array(1.2e3, 1201, 1),
          array((string)(1/3), 1 - 2/3),
          array(1/3, (string)(1 - 2/3))
        );
=======
        return [
            [2.3, 2.3],
            ['2.3', 2.3],
            [5.0, 5],
            [5, 5.0],
            [5.0, '5'],
            [1.2e3, 1200],
            [2.3, 2.5, 0.5],
            [3, 3.05, 0.05],
            [1.2e3, 1201, 1],
            [(string) (1 / 3), 1 - 2 / 3],
            [1 / 3, (string) (1 - 2 / 3)]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(2.3, 4.2),
          array('2.3', 4.2),
          array(5.0, '4'),
          array(5.0, 6),
          array(1.2e3, 1201),
          array(2.3, 2.5, 0.2),
          array(3, 3.05, 0.04),
          array(3, acos(8)),
          array(acos(8), 3),
          array(acos(8), acos(8))
        );
=======
        return [
            [2.3, 4.2],
            ['2.3', 4.2],
            [5.0, '4'],
            [5.0, 6],
            [1.2e3, 1201],
            [2.3, 2.5, 0.2],
            [3, 3.05, 0.04],
            [3, \acos(8)],
            [\acos(8), 3],
            [\acos(8), \acos(8)]
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
