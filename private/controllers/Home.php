<?php

/**
 * home controller
 */
class Home extends Controller
{
	
	function index()
	{
		// code...
		// $user = $this->load_model('User');
        $user = new User();
        
		//insert
		// $arr = [
        //     'firstname' => 'boom',
        //     'lastname' => 'Banda',
        //     'email' => 'eathorne@yahoo.com',
        //     'date' => '2021-08-10 19:08:58',
        //     'user_id' => 'eathorne.banda',
        //     'gender' => 'male',
        //     'school_id' => "0PbzcOAALCLUytlGxNog9R3ZaG5rpvjeleQ3UHSWE81m00vLyqNGBEgK4waH",
        //     'rank' => 'super_admin',
        //     'password' => password_hash('$2y$10$DfpqgNj.g4qKLJCVs9CC5esat5K0jMF49cx6wt4h0B8ZBzw6Ocrci', PASSWORD_BCRYPT),
        //     'image' => 'uploads/cardinal_1585485603.jpg',
        // ];
		// $user->insert($arr);

		//update
		// $arr['firstname'] = 'aaa';
		// $user->update(3,$arr);

		//delete
		// $user->delete(3);

		$data = $user->findAll();
		$this->view('home',['rows'=>$data]);
	}
}
