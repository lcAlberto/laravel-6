<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User as UserResource;
use App\Models\Farm;
use App\Models\User;
use App\Repositories\FarmRepository;
use App\Repositories\UserRepository;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    protected $repository;
    protected $userInfoRepository;
    protected $planRepository;
    protected $resource;
    private $perPage = 15;

    public function __construct()
    {
        $this->model = new User();
        $this->farmModel = new Farm();
    }

    public function index()
    {
        $title = 'User Management';
//        $users = $this->farmModel->users();
        $users = Farm::find(auth()->user()->id)->users;

        return view('users.index', compact('title', 'users'));
    }

    public function create()
    {
        $title = 'Create new user';
        $description = 'Cadastrar novo usuário na sua fazenda';
        $roles = Role::pluck('name','name')->all();
        return view('users.create', compact('title', 'description', 'roles'));
    }

    public function store(UserRequest $request, UserRepository $repository)
    {
        $data = $request->validated();
        dd($data);
        $data = (new UserRepository)->createHash($data);
        $user = (new UserRepository)->create($data);

        $message = _m('user.success.create');
        $user->assignRole($request->input('roles'));
        return $this->chooseReturn('success', $message, 'admin.user.index');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit', compact('user', 'userRole', 'roles'));
    }

    public function update(UserRequest $request, UserRepository $repository, $id)
    {
        $data = $repository->passwordVerification($request, $id);
        $user = (new UserRepository())->update($id, $data);

        $message = _m('user.success.update');
        $user->assignRole($request->input('roles'));
        return $this->chooseReturn('success', $message, 'admin.user.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function destroy(User $user)
    {
        try {
            (new UserRepository)->delete($user);
            return $this->chooseReturn('success', _m('user.success.destroy'));
        } catch (\Exception $exception) {
            report($exception);
            return $this->chooseReturn('error', _m('user.error.destroy'));
        }
    }

    public function pagination()
    {
        return pagination()
            ->repository(UserRepository::class)
            ->resource(UserResource::class);
    }
}
