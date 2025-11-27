<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\WasteCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WasteTypeCategory extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = WasteCategory::with('wasteItems')->get();
        return response()->json([
            'data' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        if (Str::isUuid($id)) {
            $category = WasteCategory::with('wasteItems')->find($id);
        } else {
            $category = WasteCategory::with('wasteItems')->where('slug', $id)->first();
        }
        if (!$category) {
            return response()->json([
                'message' => 'Waste category not found'
            ], 404);
        }

        return response()->json([
            'data' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
