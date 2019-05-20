<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    protected $table = "Entrepreneur";
    
    public function account()
    {
       return $this->belongsTo('InvestMe\Account', 'id_user', 'id');
    }

}

