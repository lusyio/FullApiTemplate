<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ProtocolResp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function getAppData()
    {
        $resp = new ProtocoLResp();
        $resp->result = true;
        $resp->msg = '';
        $resp->user = Auth::user();
        return $resp->response();
    }
}

