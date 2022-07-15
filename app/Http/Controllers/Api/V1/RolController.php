<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\RolResource;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RolResource::collection(Rol::all());
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
            'name' => 'required|max:45',
            'status' => 'required|max:1'
        ]);

        Rol::create($request->all());
        return response()->json(['message'=>'Data created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        return $rol;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        $newRol = Rol::find($rol->id);
        $response = [];

        if($newRol){
            $newRol->name = $request->name;
            $newRol->status = $request->status;
            $newRol->update();

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
     * @param  \App\Models\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        $response = [];

        if($rol){
            $rol->delete();
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
