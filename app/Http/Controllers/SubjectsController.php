<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
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
}