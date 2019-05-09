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

    public function level()
    {
        return $this->hasOne('InvestMe\Level', 'level', 'id');
    }
}
