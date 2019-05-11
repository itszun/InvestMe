<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sector';

    public function business()
    {
        return $this->belongsTo('InvestMe\Business', 'sector', 'id');
    }
}
