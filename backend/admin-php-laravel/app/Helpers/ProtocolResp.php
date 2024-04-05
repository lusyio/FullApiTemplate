<?php

namespace App\Helpers;

class ProtocolResp {

    public $result = false;
    public $msg = null;
    public $errors = [];

    function __construct($obj = null, $result = false) {
        $this->result = $result;
        if($obj) {
            $obj = (object)$obj;
            foreach($obj as $k => $v) {
                $this->{$k} = $obj->{$k};
            }
        }
    }

    function setMsgIfBlank($msg) {
        if($this->msg === null) {
            $this->msg = $msg;
        }
    }

    function responseIfFailed() {
        if(!$this->result) {
            $this->response();
        }
    }

    function response() {
        return response()->json($this);
    }

    function fail($msg = false) {
        if($msg) {
            $this->setMsgIfBlank($msg);
        }
        $this->result = false;
        return $this->response();
    }
}