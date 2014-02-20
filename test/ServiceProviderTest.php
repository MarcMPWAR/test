<?php

namespace Development;

class ServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    private $object_name = "hola";
    public function testGetInstance()
    {
        $serviceProvider = new ServiceProvider();

        $this->assertEquals($serviceProvider, $serviceProvider->getInstance());

    }

    /**
     * @dataProvider provider
     */
    public function testSetService($object_name)
    {

    }
    public function provider()
    {
        return array(array($this->i++));
    }

    /**
     * @expectedException        RuntimeException
     * @dataProvider provider
     */
    public function testGetService()
    {
        $getService = new ServiceProvider();
        $service = $getService->getService("Mail");

        if($this->assertEquals("Mail", $service, $message = ''))
        {
            //Hola
        }
        else
        {
            throw new RuntimeException('Invalid Service Request', 10);
        }
    }

}