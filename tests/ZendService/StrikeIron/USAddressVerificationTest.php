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
class USAddressVerificationTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->soapClient = new \stdclass();
        $this->service = new \ZendService\StrikeIron\USAddressVerification(array('client' => $this->soapClient));
    }

    public function testInheritsFromBase()
    {
        $this->assertInstanceOf('ZendService\StrikeIron\Base', $this->service);
    }

    public function testHasCorrectWsdl()
    {
        $wsdl = 'http://ws.strikeiron.com/zf1.StrikeIron/USAddressVerification4_0?WSDL';
        $this->assertEquals($wsdl, $this->service->getWsdl());
    }

    public function testInstantiationFromFactory()
    {
        $strikeIron = new \ZendService\StrikeIron\StrikeIron(array('client' => $this->soapClient));
        $client = $strikeIron->getService(array('class' => 'USAddressVerification'));

        $this->assertInstanceOf('ZendService\StrikeIron\USAddressVerification', $client);
    }
}
