<?php

class UsersController extends \BaseController {

	
    
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
            $users = User::all();
            return View::make('users.index', array('users' => $users));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            return View::make('users.create');
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
            'username' => 'required',
            'specialty' => 'required',
            'password' => 'confirmed|required|min:5'
            );
          $validator = Validator::make(Input::all(), $rules);

          if ($validator->fails()) {
              return Redirect::to('users/create')
                              ->withErrors($validator)
                              ->withInput(Input::except('password'));
          } else {

            $user = new User;
            $user->username = Input::get('username');
            $user->specialty = Input::get('specialty');
            $user->password = Hash::make(Input::get('password'));

            $user->save();

            // redirect
              Session::flash('message', 'Doctor'.$user->username.' created Succesfully!');
              return Redirect::to('users');
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
            $user = User::find($id);
            return View::make('users.edit', array('user' => $user));
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
            'username' => 'required',
            'specialty' => 'required',
            'password' => 'confirmed|min:5'
            );
            $validator = Validator::make(Input::all(), $rules);

            // process the login
            if ($validator->fails()) {
                return Redirect::to('users/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            } else {
                // store
                $user = User::find($id);
                $user->username = Input::get('username');
                $user->specialty = Input::get('specialty');
                $password = Input::get('password');
                if($password){
                    $user->password = Hash::make($password);
                }


                $user->save();

                // redirect
                Session::flash('message', 'Successfully updated doctor: '.$user->username.' !');
                return Redirect::to('users');
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
            $user = User::find($id);
            $user->delete();

            // redirect
            Session::flash('message', 'Successfully deleted '.$user->username.'!');
            return Redirect::to('users');
	}


}
