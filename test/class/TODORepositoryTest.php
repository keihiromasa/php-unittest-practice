<?php

require_once '../src/class/TODORepository.php';
require_once '../src/class/db/TODOAccessor.php';

class TODORepositoryTest extends PHPUnit_Framework_TestCase {

    /**
     * @covers TODORepository::fetchAll
     * @todo   Implement testFetchAll().
     */
    public function testFetchAllはDBにデータがない場合は固定文字列を返す() {
        $mockAccessor = $this->getMockBuilder('TODOAccessor')->disableOriginalConstructor()->getMock();
        $mockAccessor->method('selectAll')->willReturn(array());
        $target = new TODORepository($mockAccessor);
        $this->assertEquals($target->fetchAll(), array('まだリストがありません'));
    }

    public function testFetchAllはDBに登録されたデータを返す() {
        $mockAccessor = $this->getMockBuilder('TODOAccessor')->disableOriginalConstructor()->getMock();
        $result = array('TODOその１', 'TODOその２');
        $mockAccessor->method('selectAll')->willReturn($result);
        $target = new TODORepository($mockAccessor);
        $this->assertEquals($result, $target->fetchAll());
    }

}
