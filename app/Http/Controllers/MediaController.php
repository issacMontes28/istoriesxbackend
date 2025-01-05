<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMediaRequest;
use App\Models\Media;

class MediaController extends Controller
{
    public function store(StoreMediaRequest $request)
    {
        $validated = $request->validate([
            'request_id' => 'required|exists:requests,id',
            'file_path' => 'required|string',
            'media_type' => 'required|string',
            'size' => 'required|integer',
        ]);

        $mediaData = Media::create($validated);

        return response()->json($mediaData, 201);
    }

    public function index()
    {
        return Media::all();
    }
}
