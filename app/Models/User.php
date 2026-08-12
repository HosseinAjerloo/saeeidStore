<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Morilog\Jalali\Jalalian;
use function Pest\Laravel\get;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'family',
        'mobile',
        'phone',
        'national_id_number',
        'is_active',
        'email',
        'gender',
        'password',
        'phone_verified_at',
        'email_verified_at',
        'date_of_birth',
        'type'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ($this->name ?? '') . ' ' . ($this->family ?? '')
        );
    }
    public function prGender(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>$value=='male'?'مرد' : 'زن'
        );
    }
    public function ofBirth(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>Jalalian::forge($this->date_of_birth)->format('Y/m/d')
        );
    }
    public function getActive(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>$this->is_active=='1'?'فعال':'غیرفعال'
        );
    }
}
