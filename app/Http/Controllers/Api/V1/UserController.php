<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'person_id'  => 'required',
            'rol_id'     => 'required',
            'username'   => 'required',
            'email'      => 'required',
            'password'   => 'required',
            'status' => 'required|max:1'
        ]);
        $user = $request->all();
        $user['password'] = bcrypt(request('password'));
        User::create($user);
        return response()->json(['message'=>'Data created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if($user){

            return new UserResource($user);
        }else{
            return response()->json(['message'=>'cannot find registers']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newUser = User::find($id);
        $response = [];

        if($newUser){
            $newUser->username = $request->username;
            $newUser->person_id = $request->person_id;
            $newUser->rol_id = $request->rol_id;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            $newUser->status = $request->status;

            $newUser->update();

            $response = [
                'success'=>true,
                'message' => 'Data updated successfully',
                'HTTP_CODE' => Response::HTTP_OK
            ];
        }else{
            $response = [
                'success'=>false,
                'message' => 'Cannot update data',
                'HTTP_CODE'=>Response::HTTP_BAD_REQUEST
            ];
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = [];
        $user = User::find($id);
        if($user){
            $user->delete();
            $response = [
                'success' =>true,
                'message' => 'Register deleted successfully',
                'HTTP_CODE' =>Response::HTTP_NO_CONTENT
            ];
        }else{
            $response = [
                'success' =>false,
                'message' =>'Cannot find register and unable to delete',
                'HTTP_CODE' =>Response::HTTP_NO_CONTENT
            ];
        }

        return response()->json($response);
    }
}
