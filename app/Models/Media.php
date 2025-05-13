<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'file_path',
        'file_name',
        'file_type',
        'file_size',
        'alt_text',
        'description',
        'is_featured',
        'collection_name',
        'order'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_featured' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the full URL for the media.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return asset($this->file_path);
    }
}
