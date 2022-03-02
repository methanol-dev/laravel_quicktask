<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;
use App\Scopes\ActiveScope;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = [
        'isAdmin',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'user_id');
    }

    // add Accessors
    protected $appends = [
        'full_name',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . '' . $this->last_name;
    }

    // add Mutators
    public function setUsernameAttribute($username)
    {
        return $this->attributes['username'] = Str::slug($username);
    }

    // Local scope
    public function scopeIsAdmin($query)
    {
        return $query->where('isAdmin', 1);
    }

    // Use global scope
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new ActiveScope);
    }
}
