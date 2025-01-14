<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'property_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // Relationship with Property
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function propertyPics()
    {
        return $this->hasMany(PropertyPic::class); // Adjust this according to your database structure
    }
}
