<?php

namespace App\Http\Controllers\Admin;
;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use App\Models\State;
use App\Models\User;
use App\Repositories\Criteria\Common\Has;
use App\Repositories\FarmRepository;
use App\Repositories\StateRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use stdClass;

class FarmController extends Controller
{
    public function index(User $user, Farm $farm)
    {
        dd(current_user());
    }

    public function create()
    {
        $title = 'Farm Create';
        $description = 'Cadastre aqui sua fazenda';
        $states = (new StateRepository)->all()->toArray();
        // $states = (object) $states;

        return view('farm.create', compact('states', 'title', 'description'));
    }

    public function store(FarmRequest $request, User $user)
    {
        $data = $request->validated();
        $data['id'] = current_user()->id;
        $current_farm = ($farmRepository = new FarmRepository());

        $current_farm->create($data);

        $user = ($userRepository = new UserRepository());
        $user_data = current_user()->getAttributes();
        $user_data['name'] = 'current_user()->id';
        $user_data['phone'] = current_user()->id;
        $user_data['farm_id'] = current_user()->id;

        $user->update(current_user()->id, $user_data);


        return redirect()->route('home');
    }

    public function pagination()
    {
        return pagination()
            ->repository(FarmRepository::class)
            ->resource(FarmResource::class);
    }
}
