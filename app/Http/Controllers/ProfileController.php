<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Profil fotoğrafı yükleme
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            
            // Dosya türü ve boyut kontrolü
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
            $maxSize = 2 * 1024 * 1024; // 2MB
            
            if (!in_array($file->getMimeType(), $allowedMimeTypes)) {
                return Redirect::route('profile.edit')->withErrors(['profile_photo' => 'Sadece JPEG, PNG, JPG ve GIF formatları desteklenir.']);
            }
            
            if ($file->getSize() > $maxSize) {
                return Redirect::route('profile.edit')->withErrors(['profile_photo' => 'Dosya boyutu 2MB\'den küçük olmalıdır.']);
            }
            
            // Eski profil fotoğrafını sil
            if ($user->profile_photo && Storage::disk('public')->exists($user->profile_photo)) {
                Storage::disk('public')->delete($user->profile_photo);
            }
            
            // Yeni profil fotoğrafını yükle
            $profilePhotoPath = $request->file('profile_photo')->store('profile-photos', 'public');
            $data['profile_photo'] = $profilePhotoPath;
        }

        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
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
