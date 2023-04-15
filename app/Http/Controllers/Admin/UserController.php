<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserCreateRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index() {
        request()->validate(
            [
                'field' => ['nullable', 'in:id,name,email'],
                'direction' => ['nullable', 'in:asc,desc']
            ]
        );

        return Inertia::render('Admin/Users/Index', [
            'filters' => request()->only('search'),
            'users' => User::query()
            ->when(request()->input('search'), function($query, $search) {
                 $query->where('name', 'like', "%$search%");
            })
            ->when(request()->input('field'), function($query, $field) {
                $query->orderBy($field, request()->input('direction') ?? 'asc');
            })
            ->paginate(10)
            ->withQueryString()
            ->through(fn($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email
            ])
        ]);

    }

    public function create() {
        return Inertia::render('Admin/Users/Create');
    }

    public function store(UserCreateRequest $request) {
        $data = $request->validated();

        User::create($data);

        return to_route('admins.users.index');
    }
    public function edit(User $user) {
        return Inertia::render('Admin/Users/Edit', [
            'user' => $user,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user) {
        $data = $request->validated();

        if($data['password'] == null) {
            unset($data['password']);
        }

        $user->update($data);

        return to_route('admins.users.index');
    }


    public function destroy(User $user) {
        $user->delete();
    }
}
