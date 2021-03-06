<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ppdb extends Model
{
    protected $table = 'ppdb';
    protected $guarded = ['id'];
    use HasFactory;

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
