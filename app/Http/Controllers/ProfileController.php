<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
/**
 * Display the user's profile form.
 */
public function edit(Request $request): View
{
    return view('profile.edit', [
        'user' => $request->user(),
    ]);
}

/**
 * Update the user's profile information.
 */
// public function update(ProfileUpdateRequest $request): RedirectResponse
// {
//     $user = $request->user();
//     $user->fill($request->validated());

//     if ($user->profile_image && $request->hasFile('profile_image')) {
//         // Delete the old image from the storage
//         Storage::disk('public')->delete("profile_images/{$user->profile_image}"); 
//     }
    
//     // Store the new profile image if it exists
//     if ($request->hasFile('profile_image')) {
//         $path = $request->file('profile_image')->store('profile_images', 'public');
//         $user->profile_image = $path; // Update profile image path
//     }

//     // Check if email has changed
//     if ($user->isDirty('email')) {
//         $user->email_verified_at = null; // Set email verification to null
//     }

//     // Save the updated user
//     $user->save();

//     return Redirect::route('profile.edit')->with('status', 'profile-updated');
// }

public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Store the original image path  
    $originalImagePath = $user->profile_image;

    // Update the user 
    $user->fill($request->validated());

    // Attempt to update or create the user
    if ($user->update($request->validated())) {
        // Check if there's a new image
        if ($request->hasFile('profile_image')) {
            // If an image is uploaded, delete the old image
            if ($originalImagePath) {
                Storage::disk('public')->delete($originalImagePath);
            }

            // Store the new profile image and update the user model
            $path = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $path;
        }

        // If the email has changed, mark the email as unverified
        if ($user->isDirty('email')) {
            $user->email_verified_at = null; // Set email verification to null
        }
 
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'Profile picture updated.');
    }

    // Handle failure to update (optional)
    return Redirect::route('profile.edit')->with('status', 'profile-update-failed');
}

/**
 * Delete the user's account.
 */
public function destroy(Request $request): RedirectResponse
{
    $request->validateWithBag('userDeletion', rules: [
        'password' => ['required', 'current_password'],
    ]);

    $user = $request->user();

    Auth::logout();

    $user->delete();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return Redirect::to('/');
}
}
