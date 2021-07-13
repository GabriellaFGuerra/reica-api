<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'image',
        'path',
        'isBlueprint',
        'property_id'
    ];

    protected $dates = ['deleted_at'];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
