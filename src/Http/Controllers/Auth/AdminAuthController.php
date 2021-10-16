<?php

namespace Marrs\MarrsAdmin\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Marrs\MarrsAdmin\Http\Controllers\Controller;
use Marrs\MarrsAdmin\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{


    public function loginForm(Request $request)
    {
        return view('marrs-admin::auth.login_form', ['redirect' => @$request->redirect]);
    }


    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        if (!Auth::guard('admin')->attempt($credentials)) {
            return redirect()->back()->withInput($request->all())->withErrors(['message' => 'não foi possivel realizar o login , verifique o preenchimento dos campos ou tente mais tarde']);
        } else {
            if ($request->redirect) {
                return redirect($request->redirect);
            } else {
                return redirect()->route('admin.dashboard');
            }
        }
    }


    public function logout()
    {
        auth('admin')->logout();
        return redirect()->route('admin.login');
    }
}
