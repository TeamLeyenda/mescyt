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
 * @covers \SebastianBergmann\Comparator\ArrayComparator
 *
<<<<<<< HEAD
 */
class ArrayComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class ArrayComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new ArrayComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(array(), null),
          array(null, array()),
          array(null, null)
        );
=======
        return [
            [[], null],
            [null, []],
            [null, null]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            array('a' => 1, 'b' => 2),
            array('b' => 2, 'a' => 1)
          ),
          array(
            array(1),
            array('1')
          ),
          array(
            array(3, 2, 1),
            array(2, 3, 1),
            0,
            true
          ),
          array(
            array(2.3),
            array(2.5),
            0.5
          ),
          array(
            array(array(2.3)),
            array(array(2.5)),
            0.5
          ),
          array(
            array(new Struct(2.3)),
            array(new Struct(2.5)),
            0.5
          ),
        );
=======
        return [
            [
                ['a' => 1, 'b' => 2],
                ['b' => 2, 'a' => 1]
            ],
            [
                [1],
                ['1']
            ],
            [
                [3, 2, 1],
                [2, 3, 1],
                0,
                true
            ],
            [
                [2.3],
                [2.5],
                0.5
            ],
            [
                [[2.3]],
                [[2.5]],
                0.5
            ],
            [
                [new Struct(2.3)],
                [new Struct(2.5)],
                0.5
            ],
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            array(),
            array(0 => 1)
          ),
          array(
            array(0 => 1),
            array()
          ),
          array(
            array(0 => null),
            array()
          ),
          array(
            array(0 => 1, 1 => 2),
            array(0 => 1, 1 => 3)
          ),
          array(
            array('a', 'b' => array(1, 2)),
            array('a', 'b' => array(2, 1))
          ),
          array(
            array(2.3),
            array(4.2),
            0.5
          ),
          array(
            array(array(2.3)),
            array(array(4.2)),
            0.5
          ),
          array(
            array(new Struct(2.3)),
            array(new Struct(4.2)),
            0.5
          )
        );
=======
        return [
            [
                [],
                [0 => 1]
            ],
            [
                [0 => 1],
                []
            ],
            [
                [0 => null],
                []
            ],
            [
                [0 => 1, 1 => 2],
                [0 => 1, 1 => 3]
            ],
            [
                ['a', 'b' => [1, 2]],
                ['a', 'b' => [2, 1]]
            ],
            [
                [2.3],
                [4.2],
                0.5
            ],
            [
                [[2.3]],
                [[4.2]],
                0.5
            ],
            [
                [new Struct(2.3)],
                [new Struct(4.2)],
                0.5
            ]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function testAcceptsSucceeds(): void
    {
        $this->assertTrue(
          $this->comparator->accepts(array(), array())
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
    public function testAssertEqualsSucceeds($expected, $actual, $delta = 0.0, $canonicalize = false): void
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual, $delta, $canonicalize);
        }

        catch (ComparisonFailure $exception) {
        }

        $this->assertNull($exception, 'Unexpected ComparisonFailure');
    }

    /**
     * @dataProvider assertEqualsFailsProvider
     */
<<<<<<< HEAD
    public function testAssertEqualsFails($expected, $actual,$delta = 0.0, $canonicalize = false)
=======
    public function testAssertEqualsFails($expected, $actual, $delta = 0.0, $canonicalize = false): void
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure',
          'Failed asserting that two arrays are equal'
        );
        $this->comparator->assertEquals($expected, $actual, $delta, $canonicalize);
    }
}
