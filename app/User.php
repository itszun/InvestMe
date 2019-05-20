<?php

namespace InvestMe;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use InvestMe\Entrepreneur;
use InvestMe\Investor;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','level',
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

    public function hasLevel()
    {
        $levelid = $this->level;
        $levels = Level::where('id',$levelid)->first();
        return $levels->name;
    }

    public function account()
    {
        $lvl = $this->level;
        $id = $this->id;
        if($lvl == 1){
            $entr = Entrepreneur::where('id_user', $id)->first();
            return $entr;
        }else if($lvl == 2)
        {
            $inv = Investor::where('id_user', $id)->first();
            return $inv;
        }
    }

    public function balance()
    {
        $account = $this->account();
        $balance = $account->balance;
        return $balance;
    }
}
