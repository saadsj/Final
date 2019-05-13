<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function myCaptcha()
    {
        return view('myCaptcha');
    }

    public function myCaptchaPost(Request $request)
    {
        $request->validation([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ], ['captcha.captcha' => 'Invalid Captcha Code.']);
    }

    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
