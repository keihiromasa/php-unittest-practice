<?php

class TODO {

    private $what;

    public function __construct($what) {
        $this->what = $what;
    }

    public function get() {
        return $this->what;
    }

}
