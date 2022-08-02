<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PersonResource;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonResource::collection(Person::all());
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
            'dni'         => 'required|max:10',
            'names'       => 'required',
            'lastnames'   => 'required',
            'address'     => 'required',
            'phoneNumber' => 'required|max:10',
            'status'      => 'required|max:1',
        ]);
        $pr = new Person();
        $pr = $request->all();
        $response = [];
        //buscar por cedula
        $resultado = Person::where('dni',$pr['dni'])->first();
        if($resultado){
            $response = [
                'data'=>$resultado['id'],
                'message' => 'Datos guardados de forma exitosa'
            ];
        }else{
            Person::create($request->all());
            $lastId = Person::all()->last()['id'];

            $response = [
                'data' => $lastId,
                'message' => 'Datos guardados de manera exitosa',
            ];
        }
        return response()->json($response,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {

       return new PersonResource($person);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $newPerson = Person::find($person->id);
        $response = [];

        if($newPerson){
            $newPerson->gender_id   = $request->gender_id;
            $newPerson->dni         = $request->dni;
            $newPerson->names       = $request->names;
            $newPerson->lastnames   = $request->lastnames;
            $newPerson->address     = $request->address;
            $newPerson->phoneNumber = $request->phoneNumber;
            $newPerson->status      = $request->status;
            $newPerson->update();

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
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $response = [];

        if($person){
            $person->delete();
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
