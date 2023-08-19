<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
//use Illuminate\Validation\Rules\File;
use Intervention\Image\Facades\Image;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $user = auth()->user();
        $user->created_data =   \Carbon\Carbon::parse($user->created_at)->format('d.m.Y');
        return view('cabinet.index', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => ['required', 'file', 'image'],
        ]);


        /* 1 способ - без сжатия
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $destinationPath = '/images/avatars/'. $request->user_id ;
            $newFileName = $file->getClientOriginalName();
            $file->storeAs($destinationPath, $newFileName);
        } */


        //2 способ -
        $path = '/images/avatars/'. $request->user_id.'/origin/';
        $filename  = write_a_file($request,  $path, [200, 32] ,  'avatar');

        $UserProfile = UserProfile::updateOrCreate(
            ['user_id' => $request->user_id],
            [
                'avatar' => ($filename)?? null,
                'phone' => ($request->phone)?? null,
                'address' => ($request->address)?? null,
            ]
        );


        $user = auth()->user();
        return view('cabinet.index', [
            'user' => $user,
        ]);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
