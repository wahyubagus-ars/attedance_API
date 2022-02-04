<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Authentication extends Authenticatable implements JWTSubject {

    protected $table = 'authentications';
    protected $guarded = [];
    protected $hidden = ['password'];

    public function scopeSearchAuthByEmail($query, $email){
        $query->where('email', $email);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
