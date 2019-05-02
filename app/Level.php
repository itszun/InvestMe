<?php

namespace InvestMe;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "level";
    public $timestamps = false;
    protected $fillable = [
        'name', 'created_at', 'updated_at'
    ];

    public function getUserObject() {
        return $this->belongsTo(User::class);
    }
}
