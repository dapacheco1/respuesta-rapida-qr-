<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\DisappearedHasMedicamentosResource;
use App\Models\DisappearedHasMedicamentos;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisappearedHasMedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //not for now
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
            'disappeared_id'   => 'required',
            'medicine_id' => 'required'
        ]);

        DisappearedHasMedicamentos::create($request->all());
        return response()->json(['message'=>'Data created successfully'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DisappearedHasMedicamentos  $disappearedHasMedicamentos
     * @return \Illuminate\Http\Response
     */
    public function show($idDisappeared)
    {
        $search = DisappearedHasMedicamentos::where('disappeared_id',$idDisappeared)->get();
        return DisappearedHasMedicamentosResource::collection($search);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DisappearedHasMedicamentos  $disappearedHasMedicamentos
     * @return \Illuminate\Http\Response
     */
    public function updateR(Request $request, $idDisappeared,$idMedicine)
    {
        //use at final ->first(), because both ids compose the PK.
        $newDisappearedHasMedicamentos = DisappearedHasMedicamentos::where('disappeared_id',$idDisappeared)->where('medicine_id',$idMedicine)->first();
        $response = [];

        if($newDisappearedHasMedicamentos){
            $newDisappearedHasMedicamentos->disappeared_id = $request->disappeared_id;
            $newDisappearedHasMedicamentos->medicine_id = $request->medicine_id;
            $newDisappearedHasMedicamentos->save();

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
     * @param  \App\Models\DisappearedHasMedicamentos  $disappearedHasMedicamentos
     * @return \Illuminate\Http\Response
     */
    public function destroyR($idDisappeared,$idMedicine)
    {
        $response = [];
        $DisappearedHasMedicamentos = DisappearedHasMedicamentos::where('disappeared_id',$idDisappeared)->where('medicine_id',$idMedicine)->first();
        if($DisappearedHasMedicamentos){
            $DisappearedHasMedicamentos->delete();
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
