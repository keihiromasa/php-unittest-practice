<?php

require_once dirname(__FILE__) . '/TODO.php';

/**
 * Description of TODORepository
 *
 * @author hiromasa.kei
 */
class TODORepository {

    private $todoAccessor;

    public function __construct(TODOAccessor $todoAccessor) {
        $this->todoAccessor = $todoAccessor;
    }

    /**
     *
     * @return type 結果が１件もない場合は、「まだリストがありません」を返す。
     */
    public function fetchAll() {
        $result = $this->todoAccessor->selectAll();
        if (empty($result)) {
            return array(new TODO('まだリストがありません'));
        }
        return $result;
    }

    public function add(TODO $todo = null) {
        if ($todo == null) {
            return true;
        }
        return $this->todoAccessor->insert($todo);
    }

    public function delete(TODO $todo = null) {
        if ($todo == null) {
            return true;
        }
        return $this->todoAccessor->delete($todo);
    }

}
