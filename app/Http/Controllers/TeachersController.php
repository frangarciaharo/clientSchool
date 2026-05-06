<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class TeachersController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/teachers');

        $data = $response->json();
        return view('teacher.teachers', [
            'data' => $data
        ]);
    }
    public function show(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/teachers/$code");

        $data = $response->json();
        return view('teacher.show', [
            'data' => $data
        ]);
    }
        public function edit(String $code)
    {
         $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/teachers/$code");

        $data = $response->json();
        return view('teacher.edit', [
            'data' => $data
        ]);
    }

    public function create()
    {
        $token = session('token');
        $response = Http::withToken($token)
            ->get(env('API_URL') . '/users');
        $users = $response->json();
        return view('teacher.create', [
            'users' => $users
        ]);
    }
    

    public function store(Request $request)
    {
        $token = session('token');
        $response = Http::withToken($token)->post(env('API_URL') . '/teachers', [
            'code_teacher' => $request->code,
            'user_id' => $request->user_id
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/teachers')->with('success', 'Profesor creado');
    }


    public function delete(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->delete(env('API_URL') . "/teachers/$code");
        if ($response->failed()) {
            return back() ->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/teachers')->with('success', 'Profesor eliminado');

    }
}