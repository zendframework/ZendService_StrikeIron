<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Service
 */

namespace ZendServiceTest\StrikeIron;

/**
 * @category   Zend
 * @package    Zend_Service_StrikeIron
 * @subpackage UnitTests
 * @group      Zend_Service
 * @group      Zend_Service_StrikeIron
 */
class StrikeIronTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        // stub out SOAPClient instance
        $this->soapClient = new \stdclass();
        $this->options    = array('client' => $this->soapClient);
        $this->strikeIron = new \ZendService\StrikeIron\StrikeIron($this->options);
    }

    public function testFactoryThrowsOnBadName()
    {
        $this->setExpectedException('ZendService\StrikeIron\Exception\ExceptionInterface', 'Class file not found');
        $this->strikeIron->getService(array('class' => 'BadServiceNameHere'));
    }

    public function testFactoryReturnsServiceByStrikeIronClass()
    {
        $base = $this->strikeIron->getService(array('class' => 'Base'));
        $this->assertInstanceOf('ZendService\StrikeIron\Base', $base);
        $this->assertSame(null, $base->getWsdl());
        $this->assertSame($this->soapClient, $base->getSoapClient());
    }

    public function testFactoryReturnsServiceAnySlashedClass()
    {
        $class = 'ZendServiceTest\StrikeIron\StrikeIronTest\StubbedBase';
        $stub = $this->strikeIron->getService(array('class' => $class));
        $this->assertInstanceOf($class, $stub);
    }

    public function testFactoryReturnsServiceByWsdl()
    {
        $wsdl = 'http://strikeiron.com/foo';
        $base = $this->strikeIron->getService(array('wsdl' => $wsdl));
        $this->assertEquals($wsdl, $base->getWsdl());
    }

    public function testFactoryPassesOptionsFromConstructor()
    {
        $class = 'ZendServiceTest\StrikeIron\StrikeIronTest\StubbedBase';
        $stub = $this->strikeIron->getService(array('class' => $class));
        $this->assertEquals($this->options, $stub->options);
    }

    public function testFactoryMergesItsOptionsWithConstructorOptions()
    {
        $options = array('class' => 'ZendServiceTest\StrikeIron\StrikeIronTest\StubbedBase',
                         'foo'   => 'bar');

        $mergedOptions = array_merge($options, $this->options);
        unset($mergedOptions['class']);

        $stub = $this->strikeIron->getService($options);
        $this->assertEquals($mergedOptions, $stub->options);
    }

}
