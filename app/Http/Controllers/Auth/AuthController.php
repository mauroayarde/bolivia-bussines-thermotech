<?php

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Session;

use App\Models\User;

use Hash;



class AuthController extends Controller

{

	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function index()

	{

		return view('auth.login');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function registration()

	{

		return view('auth.registration');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function postLogin(Request $request)

	{

		$request->validate([

			'email' => 'required',

			'password' => 'required',

		]);



		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials)) {

			return redirect()->intended('/')

				->withSuccess('Se logueo correctamente al sistema.');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function postRegistration(Request $request)

	{

		$request->validate([

			'name' => 'required',

			'email' => 'required|email|unique:users',

			'password' => 'required|min:6',

		]);



		$data = $request->all();

		$check = $this->create($data);



		return redirect("login")->withSuccess('Se logueo correctamente al sistema.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function dashboard()

	{

		if (Auth::check()) {

			return view('dashboard');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



		/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	 public function perfil()

	 {
 
		 if (Auth::check()) {
 
			 return view('perfil');
		 }
 
 
 
		 return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	 }
 

	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function grafico1()

	{

		if (Auth::check()) {

			return view('grafico1');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function grafico2()

	{

		if (Auth::check()) {

			return view('grafico2');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function grafico3()

	{

		if (Auth::check()) {

			return view('grafico3');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */
	public function grafico4()

	{

		if (Auth::check()) {

			return view('grafico4');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */
	public function create(array $data)

	{

		return User::create([

			'name' => $data['name'],

			'email' => $data['email'],

			'password' => Hash::make($data['password'])

		]);
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */
	public function grafico5()

	{

		if (Auth::check()) {

			return view('grafico5');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */
	public function grafico6()

	{

		if (Auth::check()) {

			return view('grafico6');
		}



		return redirect("login")->withSuccess('Ingreso credenciales incorrectas.');
	}



	/**

	 * Write code on Method

	 *

	 * @return response()

	 */

	public function logout()
	{

		Session::flush();

		Auth::logout();



		return Redirect('login');
	}
}
