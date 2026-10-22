<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the photos.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $category = $request->query('category');

        $query = Photo::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('photographer', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        $photos = $query->latest()->get();
        $categories = Photo::select('category')->distinct()->pluck('category');
        $totalPhotos = Photo::count();

        return view('photos.index', compact('photos', 'categories', 'search', 'category', 'totalPhotos'));
    }

    /**
     * Display the specified photo.
     */
    public function show(Photo $photo)
    {
        $relatedPhotos = Photo::where('category', $photo->category)
            ->where('id', '!=', $photo->id)
            ->take(3)
            ->get();

        return view('photos.show', compact('photo', 'relatedPhotos'));
    }

    /**
     * Display the about page.
     */
    public function about()
    {
        $totalPhotos = Photo::count();
        $categoriesCount = Photo::distinct('category')->count('category');
        $photographersCount = Photo::distinct('photographer')->count('photographer');

        return view('about', compact('totalPhotos', 'categoriesCount', 'photographersCount'));
    }
}

