<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApiBaseController extends Controller
{
    protected $account_id;

    public function __construct()
    {
        if (Auth::guard('api')->check()) {
            $this->account_id = Auth::guard('api')->user()->account_id;
        }
    }
}