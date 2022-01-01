<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CounselorController extends Controller
{
    public function index()
    {
        $users = User::where('role_id','=',1)->get(); //get only doctors
        return view('admin.counselor.index', compact('users'));
    }

    public function create()
    {
        return view('admin.counselor.create');
    }

    public function store(Request $request)
    {
        $this->validateStore($request);
        $data = $request->all();
        $name = (new User)->userImage($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message','Counselor added successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.counselor.delete',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view ('admin.counselor.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validateUpdate($request,$id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if($request->hasFile('image')){
            $imageName = (new User)->userImage($request);
            unlink(public_path('images/'.$user->image));
        }
        $data['image'] = $imageName;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $userPassword;
        }
        $user->update($data);
        return redirect()->route('counselor.index')->with('message','Counselor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $userDelete = $user->delete();
        if($userDelete){
            unlink(public_path('images/'.$user->image));
        }
        return redirect()->route('counselor.index')->with('message','Counselor deleted successfully');
    }

    public function validateStore($request)
    {
        return $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users',
            'contact_number' => 'required|numeric',
            'position' => 'required',
            'role_id' => 'required',
            'password' => 'required|min:8|max:25',
            'image' => 'required|mimes:jpeg, jpg, png'
        ]);
    }

    public function validateUpdate($request,$id)
    {
        return $this->validate($request, [
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'contact_number' => 'required|numeric',
            'position' => 'required',
            'role_id' => 'required',
            'image' => 'mimes:jpeg, jpg, png'
        ]);
    }
}
