<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Http\Requests\CreateUserRequest $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $request->request->add(['token' => User::createToken()]);
        $userData = $request->all();
        $userData['password'] = bcrypt($request->password);
        //dd($userData);
        User::create($userData);
        return redirect()->route('admin.users.index')->with('message', __('user.admin.create.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param App\Models\User $user user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param App\Models\User          $user    user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $updateUser = $request->except(["_token", "_method", "submit", "email"]);
            $user->update($updateUser);
            return redirect()->route('admin.users.index')->with('message', __('user.admin.edit.update_success'));
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->with('alert', __('user.admin.edit.update_fail'));
        }
    }
    
    /**
      * Remove the specified resource from storage.
      *
      * @param App\Models\User $user user
      *
      * @return \Illuminate\Http\Response
      */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('admin.users.index')->with('message', __('user.admin.delete_success'));
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')->with('alert', __('user.admin.delete_fail'));
        }
    }
}
