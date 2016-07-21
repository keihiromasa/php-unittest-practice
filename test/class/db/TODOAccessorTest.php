<?php

require_once dirname(__FILE__) . '/../../../src/class/db/TODOAccessor.php';

class TODOAccessorTest extends PHPUnit_Framework_TestCase {

    private $pdo;

    public function setUp() {
        $this->pdo = new PDO('sqlite::memory:');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->query("create table todo_list(todo nvarchar(100) primary key)");
    }

    public function testSelectはデータがない場合にnullを返す() {
        $accessor = new TODOAccessor($this->pdo);
        $this->assertNull($accessor->select(new TODO('ミルクを買う')));
    }

    public function testSelect() {
        $accessor = new TODOAccessor($this->pdo);
        $value = new TODO('ミルクを買う');
        $accessor->insert($value);
        $this->assertEquals($accessor->select($value), $value);
    }

    public function testSelectAll() {
        $accessor = new TODOAccessor($this->pdo);
        $value = new TODO('ミルクを買う');
        $accessor->insert($value);
        $this->assertEquals($accessor->selectAll(), array($value));
    }

    public function testSelectAllは結果が０件の時は空のリストを返す() {
        $accessor = new TODOAccessor($this->pdo);
        $this->assertEmpty($accessor->selectAll());
    }

    public function testInsert() {
        $accessor = new TODOAccessor($this->pdo);
        $value = '牛乳を買う';
        $accessor->insert(new TODO($value));
        $this->assertEquals($accessor->selectAll(), array(new TODO($value)));
    }

    public function testInsertは重複データがある場合にfalseを返す() {
        $accessor = new TODOAccessor($this->pdo);
        $value = '牛乳を買う';
        $accessor->insert(new TODO($value));
        $this->assertFalse($accessor->insert(new TODO($value)));
    }

}
