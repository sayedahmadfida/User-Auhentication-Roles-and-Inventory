<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{

 protected $redirectTo = '/home'; // Redirect after verification

 /**
  * Where to redirect users after verification.
  *
  * @return string
  */
 public function __construct()
 {
     $this->middleware('auth'); // Ensure only authenticated users can access
     $this->middleware('signed')->only('verify'); // Ensure the verification link is signed
 }

 /**
  * Mark the authenticated user's email address as verified.
  *
  * @param  Request  $request
  * @param  string  $id
  * @param  string  $hash
  * @return \Illuminate\Http\RedirectResponse
  */
 public function verify(Request $request, $id, $hash)
 {
     $user = User::findOrFail($id);

     // Check if the hash matches the user's email
     if (!hash_equals(sha1($user->email), $hash)) {
         return redirect()->route('login')->with('error', 'Invalid verification link.');
     }

     // Mark the email as verified
     if ($user->hasVerifiedEmail()) {
         return redirect($this->redirectTo)->with('message', 'Email already verified.');
     }

     $user->markEmailAsVerified();

     return redirect($this->redirectTo)->with('message', 'Email verified successfully!');
 }
}
