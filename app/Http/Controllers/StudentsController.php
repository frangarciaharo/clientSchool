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

        $student = Http::withToken($token)
            ->get(env('API_URL') . "/students/$code");
        $courses = Http::withToken($token)
            ->get(env('API_URL') . '/courses');
        return view('student.edit', [
            'student' => $student->json(),
            'courses' => $courses->json()
        ]);
    }


    public function create()
    {
        $token = session('token');
        $response = Http::withToken($token)
            ->get(env('API_URL') . '/users');
        $courses = Http::withToken($token)
            ->get(env('API_URL') . '/courses');
        $users = $response->json();
        return view('student.create', [
            'users' => $users,
            'courses' => $courses->json()
        ]);
    }

    public function store(Request $request)
    {

        $token = session('token');
        $response = Http::withToken($token)->post(env('API_URL') . '/students', [
            'code_student' => $request->code,
            'user_id' => $request->user_id,
            'course_id' => $request->course_id
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/students')->with('success', 'Alumno creado');
    }
    public function update(Request $request, $code)
    {
        //dd($request->all(), $code);
        $token = session('token');

        $response = Http::withToken($token)->put(
            env('API_URL') . "/students/$code",
            [
                "code" => $code,
                "user_id" => $request->user_id,
                "course_code" => $request->course_code
            ]
        );

        if ($response->failed()) {
            return back()->withErrors([
                'error' => $response->json('msg') ?? 'Error desconocido'
            ]);
        }

        return redirect('/students')->with('success', 'Alumno actualizado');
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