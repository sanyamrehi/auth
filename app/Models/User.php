<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'email',
        'password',
        'mobile',
        'country_id',
        'state_id',
        'city_id',
        'address',
        'gender',
    ];

    /**
     * Validation rules for registration
     */
    public static function rules($update = false, $id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'email' => $update ? 'required|email|unique:users,email,' . $id : 'required|email|unique:users,email',
            'mobile' => 'required|regex:/^[0-9]{10,15}$/',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:500',
            'gender' => 'required|in:male,female,other',
            'password' => $update ? 'nullable|min:8|confirmed' : 'required|min:8|confirmed',
            'password_confirmation' => $update ? 'nullable|same:password' : 'required|same:password',
        ];
    }

    /**
     * Get the country that owns the user.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the state that owns the user.
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Get the city that owns the user.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

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
}
