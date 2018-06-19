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

use stdClass;

/**
 * @covers \SebastianBergmann\Comparator\TypeComparator
 *
<<<<<<< HEAD
 */
class TypeComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class TypeComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    /**
     * @var TypeComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new TypeComparator;
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(true, 1),
          array(false, array(1)),
          array(null, new stdClass),
          array(1.0, 5),
          array("", "")
        );
=======
        return [
            [true, 1],
            [false, [1]],
            [null, new stdClass],
            [1.0, 5],
            ['', '']
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(true, true),
          array(true, false),
          array(false, false),
          array(null, null),
          array(new stdClass, new stdClass),
          array(0, 0),
          array(1.0, 2.0),
          array("hello", "world"),
          array("", ""),
          array(array(), array(1,2,3))
        );
=======
        return [
            [true, true],
            [true, false],
            [false, false],
            [null, null],
            [new stdClass, new stdClass],
            [0, 0],
            [1.0, 2.0],
            ['hello', 'world'],
            ['', ''],
            [[], [1, 2, 3]]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(true, null),
          array(null, false),
          array(1.0, 0),
          array(new stdClass, array()),
          array("1", 1)
        );
=======
        return [
            [true, null],
            [null, false],
            [1.0, 0],
            [new stdClass, []],
            ['1', 1]
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
     * @dataProvider assertEqualsSucceedsProvider
     */
    public function testAssertEqualsSucceeds($expected, $actual): void
    {
        $exception = null;

        try {
            $this->comparator->assertEquals($expected, $actual);
        }

        catch (ComparisonFailure $exception) {
        }

        $this->assertNull($exception, 'Unexpected ComparisonFailure');
    }

    /**
     * @dataProvider assertEqualsFailsProvider
     */
    public function testAssertEqualsFails($expected, $actual): void
    {
        $this->setExpectedException('SebastianBergmann\\Comparator\\ComparisonFailure', 'does not match expected type');
        $this->comparator->assertEquals($expected, $actual);
    }
}
