<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\PropertyType;
use App\Models\Property;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // Share data with multiple views (filter, dashboard, etc.)
    View::composer(
        ['filter', 'dashboard', 'components.home'],  // Add any views where you want to pass this data
        function ($view) {
            $types = PropertyType::all();  // Get categories
            $view->with('types', $types);  // Share with the view

            // You can also share additional data if needed
            $view->with('selectedCategory', request()->category);
            $view->with('selectedCity', request()->city);
            $view->with('message', session('message'));  // Example of message being passed
        }
    );
    View::composer(
        ['filter', 'dashboard', 'components.home'],  // Add any views where you want to pass this data
        function ($view) {
            // Initialize the query for filtering properties
            $query = Property::query();
    
            // Apply filters for category
            if (request()->has('category') && !empty(request()->category)) {
                $query->where('Category_id', request()->category);
            }
    
            // Apply filters for city
            if (request()->has('city') && !empty(request()->city)) {
                $query->where('city', 'like', '%' . request()->city . '%');
            }
    
            // Get the filtered properties (you can modify this to paginate if needed)
            $properties = $query->with('propertyPics')->paginate(12);  // or ->get() if pagination isn't needed
    
            // Share the filtered properties with the views
            $view->with('properties', $properties);
    
            // Also share additional data such as selected filters and messages
            $view->with('selectedCategory', request()->category);
            $view->with('selectedCity', request()->city);
            $view->with('message', session('message'));  // Example of message being passed
        }
    );
    
    }
}
