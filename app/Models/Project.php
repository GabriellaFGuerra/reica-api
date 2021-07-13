<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'duedate',
        'stage'
    ];

    protected $dates = ['deleted_at', 'duedate'];

    public function properties() {
        return $this->hasMany(Property::class);
    }
}
