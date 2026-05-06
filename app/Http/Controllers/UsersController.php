<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
class UsersController extends Controller
{
    public function index()
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . '/users');

        $data = $response->json();
        //dd($data);
        return view('user.users', [
            'data' => $data
        ]);
    }

    public function show(String $id)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/users/$id");

        $data = $response->json();
        return view('user.show', [
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('user.create');
    }
    public function edit(String $id)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->get(env('API_URL') . "/users/$id");

        $data = $response->json();
        return view('user.edit', [
            'data' => $data
        ]);
    }

    public function delete(String $id)
    {
        $token = session('token');

        $response = Http::withToken($token)
            ->delete(env('API_URL') . "/users/$id");
        if ($response->failed()) {
            return back() ->withErrors(['error' => $response->json('message') ?? 'Error desconocido']);
        }
        return redirect('/users')->with('success', 'Usuario eliminado');

    }
   
    public function store(Request $request)
    {
        $token = session('token');
        $birthdate = \DateTime::createFromFormat('Y-m-d', $request->birthdate);
        $response = Http::withToken($token)->post(env('API_URL') . '/users', [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
            'dni' => $request->dni,
            'role' => 'guest',
            'birthdate' => $birthdate ? $birthdate->format('d-m-Y') : null,
        ]);
        if ($response->failed()) {
            $apiErrors = $response->json('errors');
            if ($apiErrors) {
                $formattedErrors = [];
                foreach ($apiErrors as $field => $messages) {
                    if (is_array($messages)) {
                        $formattedErrors[$field] = $messages;
                    } else {
                        $formattedErrors[$field] = [$messages];
                    }
                }
                return back()
                    ->withErrors(new MessageBag($formattedErrors))
                    ->withInput();
            }
            return back()
                ->withErrors(['error' => $response->json('message') ?? 'Error desconocido'])
                ->withInput();
        }
        return redirect('/users')->with('success', 'Usuario creado');
    }

    public function update(Request $request)
    {
        $token = session('token');
        $birthdate = \DateTime::createFromFormat('Y-m-d', $request->birthdate);
        $response = Http::withToken($token)->put(env('API_URL') . '/users/' . $request->id, [
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
            'dni' => $request->dni,
            'role' => $request->role,
            'birthdate' => $birthdate ? $birthdate->format('d-m-Y') : null,
        ]);
        if ($response->failed()) {
            $apiErrors = $response->json('errors');
            if ($apiErrors) {
                $formattedErrors = [];
                foreach ($apiErrors as $field => $messages) {
                    if (is_array($messages)) {
                        $formattedErrors[$field] = $messages;
                    } else {
                        $formattedErrors[$field] = [$messages];
                    }
                }
                return back()
                    ->withErrors(new MessageBag($formattedErrors))
                    ->withInput();
            }
            return back()
                ->withErrors(['error' => $response->json('message') ?? 'Error desconocido'])
                ->withInput();
        }
        return redirect('/users')->with('success', 'Usuario actualizado');
    }


}