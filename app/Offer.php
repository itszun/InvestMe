<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $table = "offer";

    public function user()
    {
        return $this->belongsTo('InvestMe\Account', 'from', 'id');
    }

    public function target()
    {
        return $this->hasOne('InvestMe\Account', 'to', 'id');
    }

    public function business()
    {
        return $this->hasOne('InvestMe\Business', 'id', 'business');
    }
}
