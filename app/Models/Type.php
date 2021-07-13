<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type'
    ];

    protected $dates = ['deleted_at'];

    public function property()
    {
        return $this->hasMany(Property::class);
    }

}
