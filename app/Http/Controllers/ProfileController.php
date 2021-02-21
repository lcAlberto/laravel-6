<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $repository;
    protected $resource;

    public function __construct()
    {
//        $this->model = new User();
        $this->repository = new UserRepository();
    }

    public function edit()
    {
        $title = 'Your Profile';
        return view('profile.edit', compact('title'));
    }

    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function thumbnail(Request $request)
    {
        $data = $request->all();
        $data = $this->repository->vefirfyThumbnail($data, auth()->user());
        $user = $this->repository->update(auth()->user()->id, $data);

        $message = _m('user.success.update');
        $user->assignRole($request->input('roles'));
        return back()->withPasswordStatus(__('Thumbnail successfully updated.'));
    }
}
