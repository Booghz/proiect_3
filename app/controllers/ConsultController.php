<?php
    
class ConsultController extends \BaseController {
    
    
    
    
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
               $consults = Consult::all();
               // load the view and pass the nerds
               return View::make('consult.index', array('consults' => $consults));
           }

           /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{   
            $patients = Patient::lists('name', '_id');
            $medicines = Medicine::lists('name', '_id');
		return View::make('consult.create', array('medicines' => $medicines,
                                                          'patients' => $patients
                    ));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
        ini_set('mongo.long_as_object', 1);
        $rules = array(
            'patientName' => 'required',
            'medicines' => 'required',
            'dosage' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('consults/create')
                            ->withErrors($validator)
                            ->withInput(Input::except('password'));
        }else  {
            
            $consult = new Consult;
            $user = User::find(Auth::user()->id);
            $consult = $user->consults()->save($consult);
            $patient_id = Input::get('patientName');
            $patient = Patient::find($patient_id);
            $consult = $patient->consults()->save($consult) ;
            $consult->date = Input::get('date');
            $consult->diagnostic = Input::get('diagnostic');
            $medicine = Medicine::find(Input::get('medicines'));
            $consult = $medicine->consults()->save($consult) ;
            $consult->dosage = Input::get('dosage');
    
            $consult->save();

            // redirect
            Session::flash('message', 'Consult created Succesfully!');
            return Redirect::to('consults');
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
            $consult = Consult::find($id);

            return View::make('consult.show')
                            ->with('consult', $consult);
         }

    /**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $consult = Consult::find($id);
            $patients = Patient::lists('name', '_id');
            $medicines = Medicine::lists('name', '_id');
            return View::make('consult.edit', array('consult' => $consult,
                                                    'patients' => $patients,
                                                    'medicines' => $medicines
                    ));
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
            'patientName' => 'required',
            'medicines' => 'required',
            'dosage' => 'required',
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('consults/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $consult = Consult::find($id);
                $patient_id = Input::get('patientName');
                $patient = Patient::find($patient_id);
                $consult = $patient->consults()->save($consult) ;
                $consult->date = Input::get('date');
                $consult->diagnostic = Input::get('diagnostic');
                $medicine = Medicine::find(Input::get('medicines'));
                $consult = $medicine->consults()->save($consult) ;
                $consult->dosage = Input::get('dosage');

                $consult->save();

                // redirect
                Session::flash('message', 'Successfully updated the consult!');
                return Redirect::to('consults');
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
            $consult = Consult::find($id);
            $consult->delete();

            // redirect
            Session::flash('message', 'Successfully deleted the consult!');
            return Redirect::to('consults');
	}


}
