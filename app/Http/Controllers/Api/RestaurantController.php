<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Image;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        return Restaurant::with('image')->get();
    }

    public function store(Request $request)
    {
        $restaurant = Restaurant::create($request->all());

        if ($request->has('image')) {
            $path = $request->file('image')->store('images', 'public');
            $image = Image::create(compact('path'));
            $restaurant->image()->associate($image)->save();
        }

        return $restaurant;
    }

    public function show(Restaurant $restaurant)
    {
        return $restaurant->load('image');
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->update($request->all());
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
    }
}
