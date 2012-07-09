<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Service_StrikeIron
 * @subpackage UnitTests
 */

namespace ZendTest\Service\StrikeIron;

/**
 * Test helper
 */

/**
 * @see \Zend\Service\StrikeIron\StrikeIron
 */

/**
 * @see \Zend\Service\StrikeIron\ZipCodeInfo
 */


/**
 * @category   Zend
 * @package    Zend_Service_StrikeIron
 * @subpackage UnitTests
 * @group      Zend_Service
 * @group      Zend_Service_StrikeIron
 */
class ZipCodeInfoTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->soapClient = new \stdclass();
        $this->service = new \Zend\Service\StrikeIron\ZipCodeInfo(array('client' => $this->soapClient));
    }

    public function testInheritsFromBase()
    {
        $this->assertInstanceOf('Zend\Service\StrikeIron\Base', $this->service);
    }

    public function testHasCorrectWsdl()
    {
        $wsdl = 'http://sdpws.strikeiron.com/zf1.StrikeIron/sdpZIPCodeInfo?WSDL';
        $this->assertEquals($wsdl, $this->service->getWsdl());
    }

    public function testInstantiationFromFactory()
    {
        $strikeIron = new \Zend\Service\StrikeIron\StrikeIron(array('client' => $this->soapClient));
        $client = $strikeIron->getService(array('class' => 'ZipCodeInfo'));

        $this->assertInstanceOf('Zend\Service\StrikeIron\ZipCodeInfo', $client);
    }

}
