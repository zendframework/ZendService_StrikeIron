<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Service
 */

namespace ZendServiceTest\StrikeIron\BaseTest;

use ZendService\StrikeIron;

/**
 * @category   Zend
 * @package    Zend_Service_StrikeIron
 * @subpackage UnitTests
 */
class MockSoapClient
{
    public static $outputHeaders = array('SubscriptionInfo' => array('RemainingHits' => 3));

    public $calls = array();

    public function __soapCall($method, $params, $options, $headers, &$outputHeaders)
    {
        $outputHeaders = self::$outputHeaders;

        $this->calls[] = array('method'  => $method,
                               'params'  => $params,
                               'options' => $options,
                               'headers' => $headers);

        if ($method == 'ReturnTheObject') {
            // testMethodResultWrappingAnyObject
            return new \stdclass();

        } elseif ($method == 'WrapThis') {
            // testMethodResultWrappingAnObjectAndSelectingDefaultResultProperty
            return (object)array('WrapThisResult' => 'unwraped');

        } elseif ($method == 'ThrowTheException') {
            // testMethodExceptionsAreWrapped
            throw new \Exception('foo', 43);

        } elseif ($method == 'ReturnNoOutputHeaders') {
            // testGettingSubscriptionInfoThrowsWhenHeaderNotFound
            $outputHeaders = array();

        } else {
            return 42;
        }
    }
}
