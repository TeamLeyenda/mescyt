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

use DOMNode;
use DOMDocument;

/**
 * @covers \SebastianBergmann\Comparator\DOMNodeComparator
 *
<<<<<<< HEAD
 */
class DOMNodeComparatorTest extends \PHPUnit_Framework_TestCase
=======
 * @uses \SebastianBergmann\Comparator\Comparator
 * @uses \SebastianBergmann\Comparator\Factory
 * @uses \SebastianBergmann\Comparator\ComparisonFailure
 */
final class DOMNodeComparatorTest extends TestCase
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
{
    /**
     * @var DOMNodeComparator
     */
    private $comparator;

    protected function setUp(): void
    {
        $this->comparator = new DOMNodeComparator;
    }

    public function acceptsSucceedsProvider()
    {
        $document = new DOMDocument;
<<<<<<< HEAD
        $node = new DOMNode;

        return array(
          array($document, $document),
          array($node, $node),
          array($document, $node),
          array($node, $document)
        );
=======
        $node     = new DOMNode;

        return [
            [$document, $document],
            [$node, $node],
            [$document, $node],
            [$node, $document]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function acceptsFailsProvider()
    {
        $document = new DOMDocument;

<<<<<<< HEAD
        return array(
          array($document, null),
          array(null, $document),
          array(null, null)
        );
=======
        return [
            [$document, null],
            [null, $document],
            [null, null]
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsSucceedsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<root/>')
          ),
          array(
            $this->createDOMDocument('<root attr="bar"></root>'),
            $this->createDOMDocument('<root attr="bar"/>')
          ),
          array(
            $this->createDOMDocument('<root><foo attr="bar"></foo></root>'),
            $this->createDOMDocument('<root><foo attr="bar"/></root>')
          ),
          array(
            $this->createDOMDocument("<root>\n  <child/>\n</root>"),
            $this->createDOMDocument('<root><child/></root>')
          ),
        );
=======
        return [
            [
                $this->createDOMDocument('<root></root>'),
                $this->createDOMDocument('<root/>')
            ],
            [
                $this->createDOMDocument('<root attr="bar"></root>'),
                $this->createDOMDocument('<root attr="bar"/>')
            ],
            [
                $this->createDOMDocument('<root><foo attr="bar"></foo></root>'),
                $this->createDOMDocument('<root><foo attr="bar"/></root>')
            ],
            [
                $this->createDOMDocument("<root>\n  <child/>\n</root>"),
                $this->createDOMDocument('<root><child/></root>')
            ],
            [
                $this->createDOMDocument('<Root></Root>'),
                $this->createDOMDocument('<root></root>'),
                $ignoreCase = true
            ],
            [
                $this->createDOMDocument("<a x='' a=''/>"),
                $this->createDOMDocument("<a a='' x=''/>"),
            ],
        ];
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    }

    public function assertEqualsFailsProvider()
    {
<<<<<<< HEAD
        return array(
          array(
            $this->createDOMDocument('<root></root>'),
            $this->createDOMDocument('<bar/>')
          ),
          array(
            $this->createDOMDocument('<foo attr1="bar"/>'),
            $this->createDOMDocument('<foo attr1="foobar"/>')
          ),
          array(
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo />')
          ),
          array(
            $this->createDOMDocument('<foo xmlns="urn:myns:bar"/>'),
            $this->createDOMDocument('<foo xmlns="urn:notmyns:bar"/>')
          ),
          array(
            $this->createDOMDocument('<foo> bar </foo>'),
            $this->createDOMDocument('<foo> bir </foo>')
          )
        );
    }

    private function createDOMDocument($content)
    {
        $document = new DOMDocument;
        $document->preserveWhiteSpace = false;
        $document->loadXML($content);

        return $document;
=======
        return [
            [
                $this->createDOMDocument('<root></root>'),
                $this->createDOMDocument('<bar/>')
            ],
            [
                $this->createDOMDocument('<foo attr1="bar"/>'),
                $this->createDOMDocument('<foo attr1="foobar"/>')
            ],
            [
                $this->createDOMDocument('<foo> bar </foo>'),
                $this->createDOMDocument('<foo />')
            ],
            [
                $this->createDOMDocument('<foo xmlns="urn:myns:bar"/>'),
                $this->createDOMDocument('<foo xmlns="urn:notmyns:bar"/>')
            ],
            [
                $this->createDOMDocument('<foo> bar </foo>'),
                $this->createDOMDocument('<foo> bir </foo>')
            ],
            [
                $this->createDOMDocument('<Root></Root>'),
                $this->createDOMDocument('<root></root>')
            ],
            [
                $this->createDOMDocument('<root> bar </root>'),
                $this->createDOMDocument('<root> BAR </root>')
            ]
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
<<<<<<< HEAD
    public function testAssertEqualsSucceeds($expected, $actual)
=======
    public function testAssertEqualsSucceeds($expected, $actual, $ignoreCase = false): void
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
    {
        $exception = null;

        try {
<<<<<<< HEAD
            $this->comparator->assertEquals($expected, $actual);
        }

        catch (ComparisonFailure $exception) {
=======
            $delta        = 0.0;
            $canonicalize = false;
            $this->comparator->assertEquals($expected, $actual, $delta, $canonicalize, $ignoreCase);
        } catch (ComparisonFailure $exception) {
>>>>>>> 791c95b33641ee77fe8b19f6f2bc800d9dbd5b7f
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
          'Failed asserting that two DOM'
        );
        $this->comparator->assertEquals($expected, $actual);
    }
}
