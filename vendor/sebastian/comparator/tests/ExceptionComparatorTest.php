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

use \Exception;
use \RuntimeException;

/**
 * @covers \SebastianBergmann\Comparator\ExceptionComparator
 *
<<<<<<< HEAD
 */
class ExceptionComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class ExceptionComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    /**
     * @var ExceptionComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new ExceptionComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(new Exception, new Exception),
          array(new RuntimeException, new RuntimeException),
          array(new Exception, new RuntimeException)
        );
=======
        return [
            [new Exception, new Exception],
            [new RuntimeException, new RuntimeException],
            [new Exception, new RuntimeException]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(new Exception, null),
          array(null, new Exception),
          array(null, null)
        );
=======
        return [
            [new Exception, null],
            [null, new Exception],
            [null, null]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
        $exception1 = new Exception;
        $exception2 = new Exception;

        $exception3 = new RunTimeException('Error', 100);
        $exception4 = new RunTimeException('Error', 100);

<<<<<<< HEAD
        return array(
          array($exception1, $exception1),
          array($exception1, $exception2),
          array($exception3, $exception3),
          array($exception3, $exception4)
        );
=======
        return [
            [$exception1, $exception1],
            [$exception1, $exception2],
            [$exception3, $exception3],
            [$exception3, $exception4]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
        $typeMessage = 'not instance of expected class';
        $equalMessage = 'Failed asserting that two objects are equal.';

        $exception1 = new Exception('Error', 100);
        $exception2 = new Exception('Error', 101);
        $exception3 = new Exception('Errors', 101);

        $exception4 = new RunTimeException('Error', 100);
        $exception5 = new RunTimeException('Error', 101);

<<<<<<< HEAD
        return array(
          array($exception1, $exception2, $equalMessage),
          array($exception1, $exception3, $equalMessage),
          array($exception1, $exception4, $typeMessage),
          array($exception2, $exception3, $equalMessage),
          array($exception4, $exception5, $equalMessage)
        );
=======
        return [
            [$exception1, $exception2, $equalMessage],
            [$exception1, $exception3, $equalMessage],
            [$exception1, $exception4, $typeMessage],
            [$exception2, $exception3, $equalMessage],
            [$exception4, $exception5, $equalMessage]
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
    public function testAssertEqualsFails($expected, $actual, $message): void
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', $message
        );
        $this->comparator->assertEquals($expected, $actual);
    }
}
