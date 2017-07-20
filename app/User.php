<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'email', 'password', 'provider_id', 'provider',
        'avatar', 'gender', 'location', 'website', 'oauth_token', 'oauth_token_secret',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatarUrl()
    {
        if (is_null($this->avatar)) {
            return 'http://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=mm&s=40';
        }

        return asset('storage/'.$this->avatar);
    }

    public function getAccessToken()
    {
        return $this->oauth_token;
    }

    public function getAccessTokenSecret()
    {
        return $this->oauth_token_secret;
    }
}
