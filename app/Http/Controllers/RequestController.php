<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequestModelRequest;
use App\Models\Request;
use Illuminate\Http\Request as HttpRequest;

class RequestController extends Controller
{
    public function store(StoreRequestModelRequest $request)
    {
        $validated = $request->validated();

        $requestData = Request::create($validated);

        return response()->json([
            'message' => 'Request created successfully.',
            'data' => $requestData
        ], 201);
    }

    public function index()
    {
        return Request::all();
    }
}
