<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => ['required', 'min:8', 'confirmed', 'different:current_password', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/'],
            'new_password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if (!Hash::check($request->input('current_password'), auth()->user()->getAttribute('password'))) {
            return response()->json(
                [
                    'errors' => ['current_password' => ['The current password is incorrect']],
                ],
                422,
            );
        }

        auth()
            ->user()
            ->update([
                'password' => Hash::make($request->input('new_password')),
            ]);

        return response()->json(['message' => 'Password updated successfully']);
    }
}
