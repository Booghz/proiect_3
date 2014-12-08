<?php

class PatientsController extends \BaseController {

	
        public function __construct()
        {
            $this->beforeFilter('auth');
        }
        /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
             ini_set('mongo.long_as_object', 1);
            $patients = Patient::all();
            return View::make('patient.index', array('patients' => $patients));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('patient.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
           ini_set('mongo.long_as_object', 1);
           
           $rules = array(
            'name' => 'required',
            'cnp' => 'required',
            'insurance' => 'required',
            'address' => 'required'
            );
          $validator = Validator::make(Input::all(), $rules);

          if ($validator->fails()) {
              return Redirect::to('patients/create')
                              ->withErrors($validator);
          } else {

            $patient = new Patient;
            $patient->name = Input::get('name');
            $patient->CNP = Input::get('cnp');
            $patient->address = Input::get('address');
            $patient->insurance = Input::get('insurance');

            $patient->save();
            
           

            // redirect
              Session::flash('message', 'Patient'.$patient->name.' added Succesfully!');
              return Redirect::to('patients');
          }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
