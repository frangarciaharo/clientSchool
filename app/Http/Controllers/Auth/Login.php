<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Login extends Controller
{
    public function __invoke(Request $request)
    {
        $response = Http::asJson()->post(env('API_URL') . '/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->failed()) {
            return back()->withErrors([
                'email' => 'Credenciales inválidas'
            ]);
        }

        $token = $response->json('token');

        session(['jwt' => $token]);

        return redirect('/');
    }
}