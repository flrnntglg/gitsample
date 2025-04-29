<?php

namespace App\Http\Controllers;

class MapController extends Controller
{
    public function index()
    {
        // Dummy data (replace with your actual source or DB query)
        $regions = ['Region I', 'Region II', 'Region III'];
        $technologies = ['Hydroponics', 'Aquaponics', 'Vertical Farming'];
        $crops = ['Lettuce', 'Tomato', 'Spinach'];
        
        $markers = [
            ['lat' => 16.4023, 'lng' => 120.5960, 'title' => 'Baguio'],
            ['lat' => 14.5995, 'lng' => 120.9842, 'title' => 'Manila'],
            ['lat' => 15.4828, 'lng' => 120.5981, 'title' => 'Nueva Ecija']
        ];
    
        return view('map', compact('regions', 'technologies', 'crops', 'markers'));
    }
}
