<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    // Explicitly specify the table name
    protected $table = 'properties_types';

    protected $fillable = [
        'type_name',
    ];

    // Define any relationships here if needed
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
