<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $table = 'investor';

    public function user()
    {
        $this->belongsTo('App\Account', 'id_user', 'id');
    }
}
