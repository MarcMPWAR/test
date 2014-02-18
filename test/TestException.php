<?php
class ExceptionTest extends PHPUnit_Framework_TestCase
{
        /**
        * @expectedException InvalidArgumentException
        * @expectedExceptionMessage Right Message
        */
        public function testException()
        {
            throw new InvalidArgumentException('Some message', 10);
        }
        /**
         * @expectedException InvalidArgumentException
         * @expectedExceptionCode 20
         */
        public function testCodeException()
        {
            throw new InvalidArgumentException('Some message', 10);
        }
}