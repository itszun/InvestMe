<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class UserLevel extends Model
{
    protected $table = 'level';

    public function user()
    {
        $this->belongsTo('InvestMe\Account');
    }
}
