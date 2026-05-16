<?

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class Register extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
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
        return redirect('/login')->with('success', 'Usuario creado');
    }
}