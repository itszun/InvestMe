<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'business';

    public function owner()
    {
        return $this->belongsTo('InvestMe\Entrepreneur','owner', 'id');
    }

    public function sector()
    {
        return $this->hasOne('InvestMe\Sector', 'id', 'sector');
    }
}
