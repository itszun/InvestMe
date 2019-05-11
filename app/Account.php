<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'users';

    public function investor()
    {
        return $this->hasOne('InvestMe\Investor', 'id_user', 'id' );
    }
    
    public function entrepreneur()
    {
        return $this->hasOne('InvestMe\Entrepreneur', 'id_user', 'id' );
    }
    
    public function business()
    {
        return $this->hasMany('InvestMe\Business', 'owner', 'id');
    }

    public function level()
    {
        return $this->hasOne('InvestMe\Level', 'level', 'id');
    }

    public function offers()
    {
        return $this->hasMany('InvestMe\Offer', 'from', 'id');
    }
    
    public function request()
    {
        return $this->hasMany('InvestMe\Offer', 'to', 'id');
    }

    public function contact()
    {
        return $this->hasMany('InvestMe\Contact', 'id_user', 'id');
    }
}
