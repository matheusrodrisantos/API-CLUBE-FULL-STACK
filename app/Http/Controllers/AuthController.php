<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email','password'))){
            return $this->response('Authorized',200,[
                'token'=>$request->user()->createToken('invoice',['invoice-store','invoice-update'])->plainTextToken
            ]);
        }
        return $this->response('Not authorized',403);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->response('Token revoked',200);
    }
}
