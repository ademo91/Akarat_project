<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyPic;


use Illuminate\Http\Request;

class PropertyPicturesController extends Controller
{
    public function show($id)
    {
        // Fetch the property by id
        $property = Property::find($id);

        // If the property doesn't exist, return a view with an appropriate message or handle it differently
        if (!$property) {
            return abort(404, 'Property not found');
        }
        // If the property is found, fetch the related pictures for the property
        $pictures = PropertyPic::where('property_id', $property->id)->get();

        // Return the view with the property and pictures data
        return view('property.show', [
            'property' => $property,
            'pictures' => $pictures,
        ]);
    }

}
