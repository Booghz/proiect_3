    <?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
        Eloquent::unguard();

        $this->call('UsersSeeder')
             ->call('MedicineSeeder')
             ->call('PatientSeeder');
        

        $this->command->info('All seeds have been completed!');
    }

}
