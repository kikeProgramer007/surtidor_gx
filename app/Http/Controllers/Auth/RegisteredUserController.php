<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function index(): View
    {
        $usuarios = User::all()->where('status',1);
        return view('usuarios.index',compact('usuarios'));
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // return view('auth.register');
        return view('usuarios.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        return redirect(route('user.index', absolute: false));
    }
    public function edit(User $user)
    {
        return view('usuarios.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['sometimes', 'required', 'confirmed', Rules\Password::defaults()],
        ]);
    
        // Actualización de nombre y correo
        if (isset($validated['name']) || isset($validated['email'])) {
            $user->fill($validated);
    
            // Si el email cambia, anula la verificación del correo
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }
    
            $user->save();
        }
    
        // Actualización de contraseña
        if (isset($validated['password'])) {
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }
    
        return redirect()->route('user.index')->with('status', 'Usuario actualizado correctamente.');
    }

    public function destroy(User $user)
    {
        $user->status = 0;
        $user->update();
        return back();
    }

}
