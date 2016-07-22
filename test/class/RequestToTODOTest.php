<?php

require_once dirname(__FILE__) . '/../../src/class/RequestToTODO.php';
require_once dirname(__FILE__) . '/../../src/class/TODO.php';
require_once dirname(__FILE__) . '/../../src/class/view/TODOViewElems.php';

class RequestToTODOTest extends PHPUnit_Framework_TestCase {

    public function testConvertはnullを渡されたらnullを返す() {
        $this->assertNull(RequestToTODO::convert(null));
    }

    public function testConvertは空文字を渡されたらnullを返す() {
        $this->assertNull(RequestToTODO::convert(''));
    }

    public function testConvert() {
        $this->assertNull(RequestToTODO::convert(array('invalidParameter' => 'hoge')));
        $value = 'TODOの中身';
        $expect = new TODO($value);
        $this->assertEquals($expect, RequestToTODO::convert(array(TODOViewElems::TODO => $value)));
    }

}
