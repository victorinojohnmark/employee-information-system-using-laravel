<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    public function index() {
        $people = Person::orderBy('lastname', 'desc')->paginate(10);
        // dd($people);
        return view('people.index', ['people' => $people]);
    }

    public function create() {
        $person = new Person();
        return view('people.create', ['person' => $person]);
    }

    public function store() {
        
        // Validate Data
        $data = $this->validatedData();

        //Handle file upload
        $imageFile = $this->imageFile();

        //Set profile-picture filename and signature
        $data['profile_image'] = (!$imageFile['profile_image']) ? 'avatar-error.jpg' : $imageFile['profile_image'];
        $data['signature_image'] = (!$imageFile['signature_image']) ? 'signature-error.jpg' : $imageFile['signature_image'];

        Person::create($data);

        return redirect('/people')->with('success', 'Profile Added');
    }

    public function edit($person) {
        // $person = Person::findOrFail($person);
        return view('people.edit', ['person' => Person::findOrFail($person)]);
    }

    public function update(Person $person) {
        // Validate Data
        $data = $this->validatedData();

        //Handle file upload
        $imageFile = $this->imageFile();
        //Set profile-picture filename and signature
        if (request()->file('profile_image') == null) {
            unset($data['profile_image']);
        } else {
            $data['profile_image'] = $imageFile['profile_image'];
        } 

        if (request()->file('signature_image') == null) {
            unset($data['signature_image']);
        } else {
            $data['signature_image'] = $imageFile['signature_image'];
        }
        // dd($data);
        $person->update($data);

        return redirect('/people')->with('success', 'Profile Updated');
    }

    protected function validatedData() {

        // dd(request());

        $request = request()->validate([
            'profile_image' => 'image|nullable|max:1999',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'birthdate' => 'date|required',
            'gender' => 'required',
            'marital_status' => 'required',
            'signature_image' => 'image|nullable|max:1999',
            'sss_id' => 'required',
            'tin_id' => 'required',
            'philhealth_id' => 'required',
            'pagibig_id' => 'required',
            'email' => 'email|required',
            'contact_no' => 'required',
            'address' => 'required',
        ]);

        return $request;
    }

    protected function imageFile() {

        //Handle file upload
        if(request()->hasFile('profile_image')){
            // get filename extension
            $fileProfileExt = request()->file('profile_image')->getClientOriginalName();
            // get just filename
            $fileProfile = pathinfo($fileProfileExt, PATHINFO_FILENAME);
            // get just extension
            $fileProfileExtension = request()->file('profile_image')->getClientOriginalExtension();
            //filename to store
            $profile_image = $fileProfile.'_'.time().'.'.$fileProfileExtension;
            //Upload Image
            $profilePath = request()->file('profile_image')->storeAs('public/img/profile', $profile_image);
        } else {
            // $profile_image = 'avatar-error.jpg';
            // $signature_image = 'signature-error.jpg';

            $profile_image = null;
        }

        if(request()->hasFile('signature_image')){
            // get filename extension
            $fileSignatureExt = request()->file('signature_image')->getClientOriginalName();
            // get just filename
            $fileSignature = pathinfo($fileSignatureExt, PATHINFO_FILENAME);
            // get just extension
            $fileSignatureExtension = request()->file('signature_image')->getClientOriginalExtension();
            //filename to store
            $signature_image = $fileSignature.'_'.time().'.'.$fileSignatureExtension;
            //Upload Image
            $signaturePath = request()->file('signature_image')->storeAs('public/img/signature', $signature_image);
        } else {
            // $profile_image = 'avatar-error.jpg';
            // $signature_image = 'signature-error.jpg';
            $signature_image = null;
        }



        return ['profile_image' => $profile_image, 'signature_image' => $signature_image];
    }
}
