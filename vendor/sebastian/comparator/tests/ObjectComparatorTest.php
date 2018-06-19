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
 * @covers \SebastianBergmann\Comparator\ObjectComparator
 *
<<<<<<< HEAD
 */
class ObjectComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class ObjectComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    /**
     * @var ObjectComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new ObjectComparator;
        $this->comparator->setFactory(new Factory);
    }

    public function acceptsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(new TestClass, new TestClass),
          array(new stdClass, new stdClass),
          array(new stdClass, new TestClass)
        );
=======
        return [
            [new TestClass, new TestClass],
            [new stdClass, new stdClass],
            [new stdClass, new TestClass]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function acceptsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(new stdClass, null),
          array(null, new stdClass),
          array(null, null)
        );
=======
        return [
            [new stdClass, null],
            [null, new stdClass],
            [null, null]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
        // cyclic dependencies
        $book1 = new Book;
        $book1->author = new Author('Terry Pratchett');
        $book1->author->books[] = $book1;
        $book2 = new Book;
        $book2->author = new Author('Terry Pratchett');
        $book2->author->books[] = $book2;

        $object1 = new SampleClass(4, 8, 15);
        $object2 = new SampleClass(4, 8, 15);

<<<<<<< HEAD
        return array(
          array($object1, $object1),
          array($object1, $object2),
          array($book1, $book1),
          array($book1, $book2),
          array(new Struct(2.3), new Struct(2.5), 0.5)
        );
=======
        return [
            [$object1, $object1],
            [$object1, $object2],
            [$book1, $book1],
            [$book1, $book2],
            [new Struct(2.3), new Struct(2.5), 0.5]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
        $typeMessage = 'is not instance of expected class';
        $equalMessage = 'Failed asserting that two objects are equal.';

        // cyclic dependencies
        $book1 = new Book;
        $book1->author = new Author('Terry Pratchett');
        $book1->author->books[] = $book1;
        $book2 = new Book;
        $book2->author = new Author('Terry Pratch');
        $book2->author->books[] = $book2;

        $book3 = new Book;
        $book3->author = 'Terry Pratchett';
        $book4 = new stdClass;
        $book4->author = 'Terry Pratchett';

        $object1 = new SampleClass( 4,  8, 15);
        $object2 = new SampleClass(16, 23, 42);

<<<<<<< HEAD
        return array(
          array(new SampleClass(4, 8, 15), new SampleClass(16, 23, 42), $equalMessage),
          array($object1, $object2, $equalMessage),
          array($book1, $book2, $equalMessage),
          array($book3, $book4, $typeMessage),
          array(new Struct(2.3), new Struct(4.2), $equalMessage, 0.5)
        );
=======
        return [
            [new SampleClass(4, 8, 15), new SampleClass(16, 23, 42), $equalMessage],
            [$object1, $object2, $equalMessage],
            [$book1, $book2, $equalMessage],
            [$book3, $book4, $typeMessage],
            [new Struct(2.3), new Struct(4.2), $equalMessage, 0.5]
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
    public function testAssertEqualsFails($expected, $actual, $message, $delta = 0.0): void
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure', $message
        );
        $this->comparator->assertEquals($expected, $actual, $delta);
    }
}
