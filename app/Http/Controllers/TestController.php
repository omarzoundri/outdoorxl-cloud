<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function test()
    {
        $pw = 'test';
        return bcrypt($pw);
    }

    public function charts()
    {
        return view('charts');
    }
}
