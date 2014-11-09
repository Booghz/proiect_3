<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Jenssegers\Mongodb\Model as Eloquent;

class Consult extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        protected $collection = 'consults';
        
        
        public function user(){
            return $this->belongsTo('User');
        }
        
        public function patient(){
            return $this->belongsTo('Patient');
        }
        
        public function medicine(){
            return $this->belongsTo('Medicine');
        }

}