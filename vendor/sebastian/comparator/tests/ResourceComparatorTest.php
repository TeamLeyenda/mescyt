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
 * @covers \SebastianBergmann\Comparator\ResourceComparator
 *
 */
class ResourceComparatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ResourceComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new ResourceComparator;
    }

    public function acceptsSucceedsProvider()
    {
        $tmpfile1 = tmpfile();
        $tmpfile2 = tmpfile();

        return array(
          array($tmpfile1, $tmpfile1),
          array($tmpfile2, $tmpfile2),
          array($tmpfile1, $tmpfile2)
        );
    }

    public function acceptsFailsProvider()
    {
        $tmpfile1 = tmpfile();

        return array(
          array($tmpfile1, null),
          array(null, $tmpfile1),
          array(null, null)
        );
    }

    public function assertEqualsSucceedsProvider()
    {
        $tmpfile1 = tmpfile();
        $tmpfile2 = tmpfile();

        return array(
          array($tmpfile1, $tmpfile1),
          array($tmpfile2, $tmpfile2)
        );
    }

    public function assertEqualsFailsProvider()
    {
        $tmpfile1 = tmpfile();
        $tmpfile2 = tmpfile();

        return array(
          array($tmpfile1, $tmpfile2),
          array($tmpfile2, $tmpfile1)
        );
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
    public function testAssertEqualsFails($expected, $actual): void
    {
        $this->setExpectedException('SebastianBergmann\\Comparator\\ComparisonFailure');
        $this->comparator->assertEquals($expected, $actual);
    }
}
