<?php

class PatientSeeder extends Seeder {

    public function run()
    {
        Patient::create(array('name' => 'Grigore Vasile',
                            'CNP' => '1840621440026',
                            'address' => 'Str. Luminitei, nr.3',
                            'insurance' => 'Medicover HealthCare'));
    }

}