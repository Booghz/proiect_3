<?php

class UsersSeeder extends Seeder {

    public function run()
    {
        User::create(array('username' => 'admin',
                            'password' => 'admin'));
    }

}