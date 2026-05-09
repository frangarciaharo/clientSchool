<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CoursesController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/courses');

        $data = $response->json();
        return view('course.courses', [
            'data' => $data
        ]);
    }

    public function show(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/courses/$code");

        $data = $response->json();
        return view('course.show', [
            'data' => $data
        ]);
    }

        public function create()
    {
        $token = session('token');
        $response = Http::withToken($token)
            ->get(env('API_URL') . '/courses');
        $users = $response->json();
        return view('course.create', [
            'users' => $users
        ]);
    }
    
    public function edit(String $code)
    {
         $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/courses/$code");

        $data = $response->json();

        return view('course.edit', [
            'data' => $data
        ]);
    }

        public function store(Request $request)
    {
        $token = session('token');
        $response = Http::withToken($token)->post(env('API_URL') . '/courses', [
            'code_course' => $request->code,
            'name_course' => $request->name,
            'acronym_course' => $request->acronym,
            'duration' => $request->duration
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/courses')->with('success', 'Curso creado');
    }

        public function update(Request $request)
    {
        $token = session('token');
        $response = Http::withToken($token)->put(env('API_URL') . '/courses/' . $request->id, [
            'name_course' => $request->name,
            'acronym_course' => $request->acronym,
            'duration' => $request->duration
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/courses')->with('success', 'Curso actualizado');
    }

    public function delete(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->delete(env('API_URL') . "/courses/$code");
        if ($response->failed()) {
            return back() ->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/courses')->with('success', 'Curso eliminado');
    }
}