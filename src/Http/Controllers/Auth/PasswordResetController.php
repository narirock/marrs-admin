<?php

namespace Marrs\MarrsAdmin\Http\Controllers\Auth;

use Marrs\MarrsAdmin\Models\Admin as User;
use App\Http\Controllers\Controller;
use Marrs\MarrsAdmin\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{


    public function reset(Request $request)
    {

        return view('marrs-admin::passwords.email', ['patch' => '/admin']);
    }

    public function sendpasswordemail(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if (!$validator->fails()) {
            $email = $request->email;
            $customer = User::where('email', $email)->first();
            if ($customer) {
                $token = Str::random(64);
                PasswordReset::create([
                    'email' => $email,
                    'token' => $token
                ]);
                $url = \URL::to('/');
                //gerando link de redefinição
                $link = $url . "/admin/password/resetform/" . $token;

                Mail::send('marrs-admin::emails.reset', [
                    'link' => $link,
                    'user' => $customer
                ], function ($m) use ($email) {
                    $m->from(env('MAIL_USERNAME'), 'Marrs Studio');
                    $m->to($email, 'Cliente')->subject('Redefinição de senha');
                    //$m->bcc($config->email, 'Phobos')->subject('Redefinição de senha');
                    if (env('MAIL_CC') != "") {
                        $m->bcc(env('MAIL_CC'), 'Phobos')->subject('Redefinição de senha');
                    }
                });

                return redirect()->back()->with('message', 'Email de redefinição enviado');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Email não encontrado']);
    }

    public function resetform(Request $request)
    {
        $reset = PasswordReset::where('token', 'LIKE', $request->token)->get()->last();

        if ($reset) {
            $user = User::where('email', 'Like', $reset->email)->first();
            if ($user) {
                return view('marrs-admin::passwords.reset', [
                    'authorize' => true,
                    'token' => $request->token,
                    'email' => $reset->email
                ]);
            }
        }

        return view('marrs-admin::passwords.reset', [
            'authorize' => false,
            'token' => $request->token,
            'email' => $reset->email
        ]);
    }

    public function passwordupdate(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required',
                'password-confirm' => 'required|same:password',
            ],
            [
                'password.required' => 'O campo senha é obrigatório',
                'password-confirm.required' => 'O campo senha é obrigatório',
                'password-confirm.same' => 'Senha e confirmação devem ser iguais',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->messages());
        }

        $reset = PasswordReset::where('token', 'LIKE', $request->token)->get()->last();
        if ($reset) {
            $Customer = User::where('email', 'Like', $reset->email)->first();
            if ($Customer) {
                $Customer->password = bcrypt($request->password);
                $Customer->save();
                //Alert::success('OK', 'Senha alterada com sucesso');
                return redirect('/admin/login');
            }
        }

        return view('admin.reset', [
            'authorize' => false,
            'token' => $request->token
        ]);
    }
}
