<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offer";

    public function user()
    {
        return $this->hasOne('InvestMe\Account', 'id', 'from');
    }
}
