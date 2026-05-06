<?

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function store(Request $request)
    {
        // Example validation
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create user (assuming you have App\Models\User)
        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        // Log them in
        \Illuminate\Support\Facades\Auth::login($user);

        return redirect('/');
    }
}