<?php

namespace App\Helpers;

class ProtocolError {

    public $msg = null;
    public $field = null;

    function __construct($obj = null) {
        if($obj) {
            $obj = (object)$obj;
            foreach($obj as $k => $v) {
                $this->{$k} = $obj->{$k};
            }
        }
    }

}