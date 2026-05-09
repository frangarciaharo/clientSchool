<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class StudentsController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/students');

        $data = $response->json();
        return view('student.students', [
            'data' => $data
        ]);
    }
        public function show(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/students/$code");

        $data = $response->json();
        return view('student.show', [
            'data' => $data
        ]);
    }
    public function edit(String $code)
    {
         $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/students/$code");

        $data = $response->json();
        return view('student.edit', [
            'data' => $data
        ]);
    }


    public function create()
    {
        $token = session('token');
        $response = Http::withToken($token)
            ->get(env('API_URL') . '/users');
        $users = $response->json();
        return view('student.create', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $token = session('token');
        $response = Http::withToken($token)->post(env('API_URL') . '/students', [
            'code_student' => $request->code,
            'user_id' => $request->user_id
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/students')->with('success', 'Alumno creado');
    }


    public function delete(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->delete(env('API_URL') . "/students/$code");
        if ($response->failed()) {
            return back() ->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/students')->with('success', 'Alumno eliminado');

    }
    

}