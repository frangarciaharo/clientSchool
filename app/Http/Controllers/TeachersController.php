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
        $courses = Http::withToken($token)
            ->get(env('API_URL') . '/courses');
        $data = $response->json();
        $courses = $courses->json();
        //dd($data, $courses);
        return view('teacher.edit', [
            'data' => $data,
            'courses' => $courses
        ]);
    }

    public function create()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/users');

        $courses = Http::withToken($token)
            ->get(env('API_URL') . '/courses');
        $users = collect($response->json())
            ->where('role', 'guest')
            ->values();

        return view('teacher.create', [
            'users' => $users,
            'courses' => $courses->json()
        ]);
    }
    

    public function store(Request $request)
    {
        $token = session('token');
        $response = Http::withToken($token)->post(env('API_URL') . '/teachers', [
            'code_teacher' => $request->code,
            'user_id' => $request->user_id,
            'course_code' => $request->course_code
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/teachers')->with('success', 'Profesor creado');
    }
    public function update(Request $request, string $code)
    {
        $response = Http::withToken(session('token'))->put(
            env('API_URL') . "/teachers/$code",
            [
                'code_teacher' => $code,
                'user_id' => $request->user_id,
                'course_code' => $request->course_code
            ]
        );

        return redirect('/teachers');
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