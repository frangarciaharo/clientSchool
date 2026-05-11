<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class SubjectsController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/subjects');

        $data = $response->json();
        //dd($data);
        return view('subject.subjects', [
            'data' => $data
        ]);
    }

     public function show(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/subjects/$code");

        $data = $response->json();
        //dd($data);
        return view('subject.show', [
            'data' => $data
        ]);
    }
    public function create()
    {
        $token = session('token');
        $response = Http::withToken($token)
            ->get(env('API_URL') . '/courses');
        $courses = $response->json();
        $response = Http::withToken($token)
            ->get(env('API_URL') . '/teachers');
        $teachers = $response->json();
        //dd($courses, $teachers);
        return view('subject.create', [
            'courses' => $courses,
            'teachers' => $teachers
        ]);
    }

    public function store(Request $request)
    {
        $token = session('token');
        $response = Http::withToken($token)->post(env('API_URL') . '/subjects', [
            'code_subject' => $request->code,
            'name_subject' => $request->name,
            'duration' => $request->duration,
            'code_teacher' => $request->teacher_code,
            'code_course' => $request->course_code
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/subjects')->with('success', 'Asignatura creada');
    }

    public function edit(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/subjects/$code");
        $teachers = Http::withToken($token)
            ->get(env('API_URL') . '/teachers')
            ->json();
        $courses = Http::withToken($token)
            ->get(env('API_URL') . '/courses')
            ->json();
        $data = $response->json();
        //dd($data);
        return view('subject.edit', [
            'data' => $data,
            'teachers' => $teachers,
            'courses' => $courses
        ]);
    }


    public function update(Request $request)
    {
        $token = session('token');
        $response = Http::withToken($token)->put(env('API_URL') . '/subjects/' . $request->code, [
            'code_subject' => $request->code,
            'name_subject' => $request->name,
            'duration' => $request->duration,
            'code_teacher' => $request->teacher_code,
            'code_course' => $request->course_code
        ]);
        if ($response->failed()) {
            return back()->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/subjects')->with('success', 'Asignatura actualizada');
    }




    public function delete(String $code)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->delete(env('API_URL') . "/subjects/$code");
        if ($response->failed()) {
            return back() ->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/subjects')->with('success', 'Asignatura eliminada');

    }
}
