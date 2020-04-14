<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public function index() {
        $people = Person::paginate(20);
        // dd($people);
        return view('person.index', ['people' => $people]);
    }

    public function create() {
        return view('person.create');
    }

    public function store(Request $request) {
        
        // Validate Data
        $data = $request->validate([
            'profile_image' => 'image|nullable|max:1999',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'birthdate' => 'date|required',
            'signature_image' => 'image|nullable|max:1999',
            'sss_id' => 'required',
            'tin_id' => 'required',
            'philhealth_id' => 'required',
            'pagibig_id' => 'required',
            'email' => 'email|required',
            'contact_no' => 'required',
            'address' => 'required',
        ]);

        //Handle file upload
        if($request->hasFile('profile_image') && $request->hasFile('signature_image')){
            // get filename extension
            $fileProfileExt = $request->file('profile_image')->getClientOriginalName();
            // get just filename
            $fileProfile = pathinfo($fileProfileExt, PATHINFO_FILENAME);
            // get just extension
            $fileProfileExtension = $request->file('profile_image')->getClientOriginalExtension();
            //filename to store
            $profile_image = $fileProfile.'_'.time().'_'.$fileProfileExtension;
            //Upload Image
            $profilePath = $request->file('profile_image')->storeAs('public/img/profile', $profile_image);
        } else {
            $profile_image = 'avatar-error.jpg';
        }



        $request->merge(['profile_image' => $profile_image]);
        $request->merge(['signature_image' => $profile_image]);
        $request->signature_image = $profile_image;
        Person::create($data);

        return redirect('/person')->with('success', 'Profile Added');
    }
}
