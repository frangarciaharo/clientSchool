<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
class CoursesController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/courses');

        $data = $response->json();
        // dd($data);
        return view('course.courses', [
            'data' => $data
        ]);
    }
}