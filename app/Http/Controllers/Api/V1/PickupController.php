<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pickup\StorePickUpRequest;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $pickups = $user->pickups()->latest()->get();

        return response()->json(
            [
                'pickups' => $pickups
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePickUpRequest $request)
    {
        $validateData = $request->validated();

        $user = $request->user();

        $pickup = $user->pickups()->create($validateData);

        return response()->json([
            'message' => 'Pickup scheduled successfully',
            'pickup' => $pickup
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {

        $user = $request->user();

        $pickup = $user->pickups()->findOrFail($id);

        return response()->json(
            [
                'pickup' => $pickup
            ]
        );
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
