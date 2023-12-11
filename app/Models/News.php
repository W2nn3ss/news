<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'text',
        'author',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->date = Carbon::now()->format('Y-m-d H:i:s');
        });
    }
}
