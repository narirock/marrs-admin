<?php

namespace Marrs\MarrsAdmin\Http\Controllers\Admin;

use Marrs\MarrsAdmin\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return view('marrs-admin::dashboard.index');
    }
}
