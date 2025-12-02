<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    /**
     * Get authenticated user profile.
     */
    public function index(Request $request)
    {

        $user = $request->user()->load('profile');

        return response()->json([
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfileRequest $request)
    {

        $validated = $request->validated();
        $user = $request->user();


        $profile = $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            [

                'avatar' => $validated['avatar'] ?? $user->profile?->avatar,
                'userType' => $validated['userType'] ?? $user->profile?->userType,
                'pickupLocation' => $validated['pickupLocation'] ?? $user->profile?->pickupLocation,
            ]
        );


        if (isset($validated['fullName'])) {
            $user->fullName = $validated['fullName'];
            $user->save();
        }


        $user->load('profile');

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
            // 'profile' => $profile
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(string $id) {}

    // public function update(ProfileRequest $request)
    // {
    //     $user = $request->user();

    //     $validated = $request->validated();

    //     $profile = $user->profile()->updateOrCreate(
    //         ['user_id' => $user->id],
    //         [
    //             'userType' => $validated['userType'] ?? $user->profile->userType,
    //             'pickupLocation' => $validated['pickupLocation'] ?? $user->profile->pickupLocation,
    //             'avatar' => $validated['avatar'] ?? $user->profile->avatar,
    //         ]
    //     );

    //     if (isset($validated['fullName'])) {
    //         $user->fullName = $validated['fullName'];
    //         $user->save();
    //     }

    //     $user->load('profile');

    //     return response()->json([
    //         'message' => 'Profile updated successfully',
    //         'user' => $user,
    //         'profile' => $profile
    //     ]);
    // }

    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $request->user();

        // FIX IS HERE: Use $request, not $user
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                ['avatar' => $path]
            );

            return response()->json([
                'message' => 'Avatar uploaded successfully',
                'avatar_url' => asset('storage/' . $path),
            ], 200);
        }

        return response()->json(['message' => 'No file uploaded'], 400);
    }
}
