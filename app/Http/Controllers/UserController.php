<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create() {
        return view('users.create');
    }

    public function store(CreateUserRequest $request) {
        User::create($request->only([
            'name',
            'phone',
            'email',
            'password',
            'year',
            ]));
        return redirect(route('users.create'))->with('status', 'Пользаватель успешно зарегистрирован');
    }

    public function update(Request $request, $id) {
        $this->validate($request,[
            'name'=>'required',
            'email' => 'required',
            'phone' => 'required',
            'year' => 'required',
        ]);
        User::find($id)->update($request->all());
        return redirect()->route('users.index')->with('status', 'Пользователь успешно обнавлено');
    }

    public function edit(Request $request, $id) {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function search(Request $request) {
        $u = $request->search;
        $y = $request->searchYear;
        $query = User::query();
        if ($request->has('search')) {
            $query->where('name',  'LIKE', "%{$u}%");
        }
        if ($request->has('searchYear')) {
            $query->where('year', 'LIKE', "%{$y}%");
        }
        $users = $query->orderBy('name')->get();
        return view('users.index', compact('users'));
    }
}

