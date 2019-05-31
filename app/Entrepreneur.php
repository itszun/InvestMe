<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    protected $table = "entrepreneur";
    
    public function account()
    {
       return $this->belongsTo('InvestMe\Account', 'id_user', 'id');
    }

}

