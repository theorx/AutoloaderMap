<?php

namespace Tests\Unit\Theorx\AutoLoaderMap;

use Theorx\AutoLoaderMap\AutoLoaderMap;
use Theorx\AutoLoaderMap\Exceptions\MapLoadingException;

/**
 * Class AutoLoaderMapTest
 *
 * @author             Lauri Orgla <theorx@hotmail.com>
 * @coversDefaultClass Theorx\AutoLoaderMap\AutoLoaderMap
 * @package            Tests\Unit\Theorx\AutoLoaderMap
 */
class AutoLoaderMapTest extends \PHPUnit_Framework_TestCase {

    /**
     * @author Lauri Orgla <theorx@hotmail.com>
     * @return array
     */
    public function provideMapsMethodsAndData() {

        $dir = realpath(__DIR__ . '/../../../library/');

        return [
            [
                'getClassMap',
                $dir . '/../../../composer/autoload_classmap.php',
                [
                    'class1' => 'file1.php',
                    'class2' => 'file2.php'
                ]
            ],
            [
                'getNamespaces',
                $dir . '/../../../composer/autoload_namespaces.php',
                [
                    'Ns/test/1',
                    'Ns/test/2',
                    'Ns/test/3'
                ]
            ],
            [
                'getPSR4',
                $dir . '/../../../composer/autoload_psr4.php',
                [
                    'psr4Class2341'  => 'file4.php',
                    'someOtherClass' => 'file5.php'
                ]
            ]
        ];
    }

    /**
     * @author       Lauri Orgla <theorx@hotmail.com>
     * @covers ::getClassMap
     * @covers ::getNamespaces
     * @covers ::getPSR4
     * @dataProvider provideMapsMethodsAndData
     *
     * @param $method
     * @param $path
     * @param $data
     */
    public function testReadClassMaps($method, $path, $data) {

        $mock = $this->getMockBuilder(AutoLoaderMap::class)->setMethods(['requireMap'])->getMock();
        $mock->expects($this->once())->method('requireMap')
            ->with($this->equalTo($path))->willReturn($data);

        /**
         * @var $mock AutoLoaderMap
         */
        $this->assertEquals($mock->{$method}(), $data);
    }

    /**
     * @author Lauri Orgla <theorx@hotmail.com>
     * @covers ::requireMap
     * @expectedException \Theorx\AutoLoaderMap\Exceptions\MapLoadingException
     */
    public function testRequireMapThrowsMapLoadingException() {

        $instance = new AutoLoaderMap();
        $instance->requireMap('invalid file');
    }

    /**
     * @author Lauri Orgla <theorx@hotmail.com>
     * @covers ::requireMap
     * @covers ::fileExists
     */
    public function testRequireMapReturnsData() {

        $instance = new AutoLoaderMap();
        $result = $instance->requireMap(__DIR__ . '/../../stub/ExampleFile.php');
        $this->assertCount(3, $result);
    }
}