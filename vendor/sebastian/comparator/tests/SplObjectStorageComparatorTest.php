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

use SplObjectStorage;
use stdClass;

/**
 * @covers \SebastianBergmann\Comparator\SplObjectStorageComparator
 *
 */
class SplObjectStorageComparatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SplObjectStorageComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new SplObjectStorageComparator;
    }

    public function acceptsFailsProvider()
    {
        return array(
          array(new SplObjectStorage, new stdClass),
          array(new stdClass, new SplObjectStorage),
          array(new stdClass, new stdClass)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        $object1 = new stdClass();
        $object2 = new stdClass();

        $storage1 = new SplObjectStorage();
        $storage2 = new SplObjectStorage();

        $storage3 = new SplObjectStorage();
        $storage3->attach($object1);
        $storage3->attach($object2);

        $storage4 = new SplObjectStorage();
        $storage4->attach($object2);
        $storage4->attach($object1);

        return array(
          array($storage1, $storage1),
          array($storage1, $storage2),
          array($storage3, $storage3),
          array($storage3, $storage4)
        );
    }

    public function assertEqualsFailsProvider()
    {
        $object1 = new stdClass;
        $object2 = new stdClass;

        $storage1 = new SplObjectStorage;

        $storage2 = new SplObjectStorage;
        $storage2->attach($object1);

        $storage3 = new SplObjectStorage;
        $storage3->attach($object2);
        $storage3->attach($object1);

        return array(
          array($storage1, $storage2),
          array($storage1, $storage3),
          array($storage2, $storage3),
        );
    }

    public function testAcceptsSucceeds(): void
    {
        $this->assertTrue(
          $this->comparator->accepts(
            new SplObjectStorage,
            new SplObjectStorage
          )
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
    public function testAssertEqualsFails($expected, $actual): void
    {
        $this->setExpectedException(
          'SebastianBergmann\\Comparator\\ComparisonFailure',
          'Failed asserting that two objects are equal.'
        );
        $this->comparator->assertEquals($expected, $actual);
    }
}
