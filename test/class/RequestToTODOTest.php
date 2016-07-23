<?php

require_once dirname(__FILE__) . '/../../src/class/RequestToTODO.php';
require_once dirname(__FILE__) . '/../../src/class/TODO.php';
require_once dirname(__FILE__) . '/../../src/class/view/TODOViewElems.php';

class RequestToTODOTest extends PHPUnit_Framework_TestCase {

    public function testConvertはnullを渡されたらnullを返す() {
        $this->assertNull(RequestToTODO::convertRegist(null));
    }

    public function testConvertは空文字を渡されたらnullを返す() {
        $this->assertNull(RequestToTODO::convertRegist(''));
    }

    public function testConvert() {
        $this->assertNull(RequestToTODO::convertRegist(array('invalidParameter' => 'hoge')));
        $value = 'TODOの中身';
        $expect = new TODO($value);
        $this->assertEquals($expect, RequestToTODO::convertRegist(array(TODOViewElems::TODO_REGIST => $value)));
    }

}
