<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    protected $fillable = [
        'title', 'description', 'category_id', 'city', 'location', 'status', 'size', 'price', 'user_id'
    ];
    use HasFactory;
    
    // Define the relationship to PropertyPics
    public function propertyPics()
    {
        return $this->hasMany(PropertyPic::class , 'property_id');
    }
    // Define the relationship to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // Define the relationship to Category
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function wishlist()
    {
        return $this->hasMany(Like::class);
    }

}
