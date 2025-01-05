<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlatformRequest;
use App\Models\Platform;

class PlatformController extends Controller
{
    public function index()
    {
        return Platform::all();
    }

    public function store(StorePlatformRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'api_endpoint' => 'nullable|string',
        ]);

        $platform = Platform::create($validated);

        return response()->json($platform, 201);
    }
}
