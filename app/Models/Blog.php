<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Blog extends Model implements Viewable
{
    use HasFactory, Sluggable, Commentable, InteractsWithViews;

    protected $guarded = ['id'];
    protected $removeViewsOnDelete = true;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
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

    public function getCreatedDate()
    {
        return Carbon::make($this->created_at)->translatedFormat('d F Y');
    }
}
