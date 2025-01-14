<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPic extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it's plural form of model name)
    protected $table = 'property_pics';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'property_id',
        'image_path',
    ];

    // Define the relationship to the Property model (assuming you have a Property model)
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
