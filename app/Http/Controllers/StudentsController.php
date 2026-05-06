<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
class StudentsController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/students');

        $data = $response->json();
        // dd($data);
        return view('student.students', [
            'data' => $data
        ]);
    }
}