<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userLogin($request)
    {
        $remember_session = $request->filled('remember');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_session)) {
            return redirect()->route('index')->with('successLogin', 'Se ha inciado sesión correctamente.');
        }
        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    public function userLogout($request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // return $this->respond(200, null, null, 'Se ha cerrado sesión correctamente.');

        } catch (\Throwable $e) {
            // return $this->respond(500, [], $e->getMessage(), 'Error al cerrar sesión.');
        }
    }
}
