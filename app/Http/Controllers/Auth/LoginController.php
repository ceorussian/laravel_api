<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use JWTAuth;
use App\User;

class LoginController extends Controller
{
    public function login (LoginRequest $request) {
        $credentials = $request->all();
        $token = null;
        
        try {
           if (!$token = JWTAuth::attempt($credentials)) {
            return $this->respondError(__('invalid_email_or_password'));
           }
        } catch (JWTAuthException $e) {
            return $this->respondError(__('failed_to_create_token'));
        }

        return $this->respondSuccess([
            'token' => $token,
            'expiredIn' => config('jwt.ttl')
        ], __('common.login.notification.loginSuccess'));
    }

    public function profile () {
        $user  = auth()->user();

        return $this->respondSuccess([
            'user' => $user,
            'expiredIn' => config('jwt.ttl')
        ]);
    }

    public function logout (Request $request) {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return $this->respondSuccess([
                'token' => $token,
                'expiredIn' => config('jwt.ttl')
            ], __('common.login.notification.logoutSuccess'));
        } catch (JWTException $exception) {
            return $this->respondError(__('common.login.notification.logoutFailed'));
        }
    }
}
