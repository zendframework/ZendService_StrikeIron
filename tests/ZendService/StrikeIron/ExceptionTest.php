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
class ExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testInheritsFromZendException()
    {
        $exception = new \ZendService\StrikeIron\Exception\RuntimeException();
        $this->assertInstanceOf('ZendService\StrikeIron\Exception\ExceptionInterface', $exception);
    }
}
