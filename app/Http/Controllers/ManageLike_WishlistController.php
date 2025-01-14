<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Like;
use App\Models\Property;
use App\Models\Wishlist;


use Illuminate\Http\Request;

class ManageLike_WishlistController extends Controller
{
    public function index()
    {
        $properties = Property::with('propertyPics')->get();

        foreach ($properties as $property) {
            // Calculate the number of likes for the current property
            $property->likeCount = Like::where('property_id', $property->id)->count();
        }

        return view('properties_List.index', compact('properties'));
    }

    public function storeLike($property_id){
        // Check if the user is authenticated
        if(auth()->check()){
            // Check if the user has already liked the property
            $like = auth()->user()->likes()->where('property_id', $property_id)->first();
            if($like){
                // If the user has already liked the property, remove the like
                $like->delete();
                // Recalculate the like count after removing the like
                $count = Like::where('property_id', $property_id)->count();
                
                return redirect()->back()->with('likeCount', $count)->with('propertyId', $property_id);
                // return view('properties_List',['count' => $count]);
                // return response()->json(['status' => 'unliked', 'count' => $count]);
            }else{
                // If the user has not liked the property, create a new like
                auth()->user()->likes()->create(['property_id' => $property_id]);
                // Recalculate the like count after adding the like
                $count = Like::where('property_id', $property_id)->count();

                 // Redirect back with the like count
                return redirect()->back()->with('likeCount', $count)->with('propertyId', $property_id);
                // return response()->json(['status' => 'liked', 'count' => $count]);

            }
        }return redirect()->route('login'); // Redirect to login if unauthenticated
    }

    public function storeWishlist($property_id){
        // Check if the user is authenticated
        if(auth()->check()){
            // Check if the user has already liked the property
            $wish = auth()->user()->wishlists()->where('property_id', $property_id)->first();
            if($wish){
                // If the user has already liked the property, remove the like
                $wish->delete();
                
                return redirect()->back()->with('propertyId', $property_id);
                // return view('properties_List',['count' => $count]);
                return response()->json(['status' => 'unstored']);
            }else{
                // If the user has not liked the property, create a new like
                auth()->user()->wishlists()->create(['property_id' => $property_id]);

                // Redirect back with the like count
                return redirect()->back()->with('propertyId', $property_id);
                return response()->json(['status' => 'stored']);

            }
        }return redirect()->route('login'); // Redirect to login if unauthenticated
    }

    // display all the wishlist of user
    public function GetWishlists()
    {
        $wishlists = auth()->user()->wishlists()->with('property')->get();
        // return response()->json(['wishlists' => $wishlists]);

        return view('components.wishlist', compact('wishlists'));
    }

}
