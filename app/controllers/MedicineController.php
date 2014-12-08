<?php

class MedicineController extends \BaseController {

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
		 $medicine = Medicine::all();
               return View::make('medicine.index', array('medicine' => $medicine));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		return View::make('medicine.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
        ini_set('mongo.long_as_object', 1);
        $rules = array(
            'name' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('medicine/create')
                            ->withErrors($validator);
        } else {

            $medicine = new Medicine;
            $medicine->name = Input::get('name');

            $medicine->save();

            // redirect
            Session::flash('message', 'Medicine created Succesfully!');
            return Redirect::to('medicine');
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
            $medicine = Medicine::find($id);
            return View::make('medicine.edit', array('medicine' => $medicine));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            ini_set('mongo.long_as_object', 1);
            $rules = array(
            'name' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('medicine/' . $id . '/edit')
                    ->withErrors($validator);
            } else {
                // store
                $medicine = Medicine::find($id);
                $medicine->name = Input::get('name');


                $medicine->save();

                // redirect
                Session::flash('message', 'Successfully updated the medicine!');
                return Redirect::to('medicine');
            }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $medicine = Medicine::find($id);
            $medicine->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the medicine!');
            return Redirect::to('medicine');
	}


}
