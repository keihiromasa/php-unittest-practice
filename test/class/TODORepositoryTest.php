<?php

require_once dirname(__FILE__) . '/../../src/class/TODORepository.php';
require_once dirname(__FILE__) . '/../../src/class/db/TODOAccessor.php';

class TODORepositoryTest extends PHPUnit_Framework_TestCase {

    public function testFetchAllはDBにデータがない場合は固定文字列を返す() {
        $mockAccessor = $this->getMockBuilder('TODOAccessor')->disableOriginalConstructor()->getMock();
        $mockAccessor->method('selectAll')->willReturn(array());
        $target = new TODORepository($mockAccessor);
        $this->assertEquals($target->fetchAll(), array(new TODO('まだリストがありません')));
    }

    public function testFetchAllはDBに登録されたデータを返す() {
        $mockAccessor = $this->getMockBuilder('TODOAccessor')->disableOriginalConstructor()->getMock();
        $result = array('TODOその１', 'TODOその２');
        $mockAccessor->method('selectAll')->willReturn($result);
        $target = new TODORepository($mockAccessor);
        $this->assertEquals($result, $target->fetchAll());
    }

    public function testAddはnullを渡されたらtrueを返す() {
        $mockAccessor = $this->getMockBuilder('TODOAccessor')->disableOriginalConstructor()->getMock();
        $target = new TODORepository($mockAccessor);
        $this->assertTrue($target->add(null));
    }

    public function testdeleteはnullを渡されたらtrueを返す() {
        $mockAccessor = $this->getMockBuilder('TODOAccessor')->disableOriginalConstructor()->getMock();
        $target = new TODORepository($mockAccessor);
        $this->assertTrue($target->delete(null));
    }

    public function testDeleteはTODOAccessorのdeleteを１回だけ呼び出す() {
        //TODO 実装する
        $todo = new TODO('ミルクを買う');
        $mockAccessor = $this->getMockBuilder('TODOAccessor')->disableOriginalConstructor()->getMock();
        $mockAccessor->expects($this->once())->method('delete')->with($todo);
        $target = new TODORepository($mockAccessor);
        $target->delete($todo);
    }

}
