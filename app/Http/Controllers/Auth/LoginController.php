<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Services\Auth\AuthService;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends ApiController
{
    protected AuthService $service;

    public function __construct(AuthService $service, Request $request)
    {
        $this->middleware('guest')->except('logout');
        $this->service = $service;
        parent::__construct($request);
    }

    public function login(LoginRequest $request)
    {
        try {
            $user = $this->service->login($request);
            return $this->sendSuccess($user, null, 200);
        } catch (Exception $e) {
            return $this->sendError(null, $e->getMessage(), 400);
        }
    }

    public function logout(Request $request)
    {

        if ($request->expectsJson()) {
            $user = $this->service->logout();
            return $this->sendSuccess($user, null, 200);
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
