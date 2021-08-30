<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function blogger()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getStatus()
    {
        $class_name = [
            'pending'=>'warning',
            'accepted'=>'success',
            'rejected'=>'danger'
        ];

        return "<span class=\"badge badge-{$class_name[$this->status]}\">$this->status</span>";
    }
}
