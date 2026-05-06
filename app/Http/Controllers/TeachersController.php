<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
class TeachersController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/teachers');

        $data = $response->json();
        //dd($data);
        return view('teacher.teachers', [
            'data' => $data
        ]);
    }
}