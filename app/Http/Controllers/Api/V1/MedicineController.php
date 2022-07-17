<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\MedicineResource;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MedicineResource::collection(Medicine::all());
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
            'name'   => 'required|max:45',
            'dose' => 'required',
            'status' => 'required|max:1'

        ]);
        Medicine::create($request->all());
        return response()->json(['message'=>'Data created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        return new MedicineResource($medicine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //search
        $newMedicine = Medicine::find($medicine->id);
        $response = [];
        //exists?
        if($newMedicine){
            $newMedicine->name = $request->name;
            $newMedicine->dose = $request->dose;
            $newMedicine->status = $request->status;
            $newMedicine->update();

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
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $response = [];

        if($medicine){
            $medicine->delete();
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
