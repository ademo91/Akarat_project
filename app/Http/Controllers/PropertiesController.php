<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\PropertyPic; 
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(10); // Fetch paginated properties
        $types = PropertyType::all(); // Fetch all property types

        return view('welcome', [
            'properties' => $properties,
            'types' => $types,
        ]);
    }

    public function filter(Request $request)
{
    // Fetch all property categories for the search form
    $types = PropertyType::all(); // Adjust this based on how you fetch your categories

    
    // Initialize the query for filtering properties
    $query = Property::query();

    // Filter by category if selected
    if ($request->has('category') && !empty($request->category)) {
        $query->where('Category_id', $request->category);
    }

    // Filter by city if provided
    if ($request->has('city') && !empty($request->city)) {
        $query->where('city', 'like', '%' . $request->city . '%'); // Use 'like' for partial matching
    }

     // Get the filtered properties with pagination (12 properties per page)
    $properties = $query->with('propertyPics')->paginate(12); // Eager load propertyPics for each property

    // Return the welcome view by default
    return view('welcome', [
        'properties' => $properties,
        'types' => $types,
        'selectedCategory' => $request->category,
        'selectedCity' => $request->city,
        'message' => $properties->isEmpty() ? 'No properties found' : null,
    ]);
}

    
    public function show($id)
    {
        $property_details  = Property::find($id);
        // Fetch all related pictures for the property usig query
        $Property_pictures = PropertyPic::where('property_id', $id)->get();

        if (!$property_details) {
            return redirect()->back()->with('error', 'Property not found');
        }
        // Return the view with data
        return view('components.property_details', [
            'property_details' => $property_details,
            'Property_pictures' => $Property_pictures
        ]);
    }
    public function UserProperty()
    {
            // Fetch all properties belonging to the authenticated user along with their pictures
        $properties = auth()->user()->properties()->with('propertyPics')->get();

        // Check if the user has any properties
        if ($properties->isEmpty()) {
            return redirect()->back()->with('error', 'No properties found for this user');
        }

        // Return the view with data
        // return response()->json(['properties' => $properties]);
        return view('components.user_Properties', ['properties' => $properties,]);
    }


    public function store(Request $request)
    {
         // Get the currently authenticated user's ID
        $userId = auth()->id();
        // store new property
        $property = Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'city' => $request->city,
            'location' => $request->location,
            'size' => $request->size,
            'price' => $request->price,
            'city' => $request->city,
            'user_id' => $userId,
        ]);
        
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('Properties_Pics'), $imagePath);
                PropertyPic::create([
                    'property_id' => $property->id,
                    'image_path' => $imagePath,
                ]);
            }
        };

            // Flash success message and stay on the same page
            session()->flash('success', 'Property created successfully!');
            
            // Redirect back to the same page (the form)
            return back();

    }
}
