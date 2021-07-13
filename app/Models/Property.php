<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'contact_number',
        'total_area',
        'useful_area',
        'bedrooms',
        'bathrooms',
        'suites',
        'parking',
        'pools',
        'description',
        'property_type',
        'modality_id',
        'unity_number',
        'address_id',
        'project_id',
        'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function modality()
    {
        return $this->belongsTo(Modality::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
}
