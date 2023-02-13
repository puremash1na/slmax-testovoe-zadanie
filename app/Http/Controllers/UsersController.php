<?php
namespace App\Http\Controllers;
use App\Models\Users;
use Illuminate\Http\Request;
class UsersController extends Controller {
    public function index() {
        $users = Users::orderBy('id','desc')->paginate(5);
        return view('users.index', compact('users'));
    }
    public function create() {
        return view('users.create');
    }
    public function store(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:60'],
            'surname' => ['required', 'string', 'max:60'],
            'birthdate' => ['required'],
            'sex' => ['required', 'in:"0","1"'],
            'birthplace' => ['required', 'string', 'max:60'],
        ]);

        Users::create($request->post());
        return redirect()->route('users.index')->with('success','User created');
    }
    public function show(Users $user) {
        return view('users.show',compact('user'));
    }
    public function edit(Users $user) {
        return view('users.edit',compact('user'));
    }
    public function update(Request $request, Users $user) {
        $request->validate([
            'name' => ['required', 'string', 'max:60'],
            'surname' => ['required', 'string', 'max:60'],
            'birthdate' => ['required'],
            'sex' => ['required', 'in:"0","1"'],
            'birthplace' => ['required', 'string', 'max:60'],
        ]);

        $user->fill($request->post())->save();
        return redirect()->route('users.index')->with('success','User updated');
    }
    public function destroy(Users $user) {
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted');
    }
}
