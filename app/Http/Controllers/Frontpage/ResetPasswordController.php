<?php

namespace App\Http\Controllers\Frontpage;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Mail;

class ResetPasswordController extends Controller
{
    public function index(){

    	return view('frontpage.auth.reset-password');
    }

    public function kirim_request_password(Request $request){

    	$this->validateEmail($request);

    	setlocale(LC_TIME, 'IND');

    	$email = $request->email;        

    	$token = csrf_token();

    	$cek = DB::table('m_member')->where('cm_email',$email)->get();

    	$cekreset = DB::table('d_reset_passwordmember')->where('rpm_email',$email)->get();

    	DB::beginTransaction();

        try{

            if(count($cek) != 0){

            	if(count($cekreset) != 0){

            		DB::table('d_reset_passwordmember')->where('rpm_email',$email)->delete();

            		DB::table('d_reset_passwordmember')->insert([

            			'rpm_email' => $email,

            			'rpm_token' => $token,

            			'rpm_expired' => Carbon::now()->addHours(1),

            		]);

            	}

                else{

					DB::table('d_reset_passwordmember')->insert([

            			'rpm_email' => $email,

            			'rpm_token' => $token,

            			'rpm_expired' => Carbon::now()->addHours(1),

            		]);

            	}
                
                $name = $cek[0]->cm_name;

                $data=array('email'=>$email,'token'=>$token);

                Mail::send('frontpage.auth.mail-reset-password', $data, function($message) use ($email, $name) {

                $message->to($email, $name)

                ->subject('Reset Password Akun');

                });

            	DB::commit();

            	return response()->json([

            		'status' => 'success',

            	]);

            }

            else{

            	return response()->json([

            		'status' => 'tidakada',

            	]);

            }
            
        }

        catch (\Exception $e) {

            DB::rollBack();

            throw $e;

            return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);

            } catch (\Throwable $e) {

            DB::rollBack();

            throw $e;

            return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);

            }

    }

     protected function validateEmail(Request $request)

    {

        $this->validate($request, ['email' => 'required|email']);

    }

    public function resetpasswordform(Request $request, $token = null){

    	$cek = DB::table('d_reset_passwordmember')->where('rpm_token', $token)->where('rpm_email',$request->email)->count();

    	$cektime = DB::table('d_reset_passwordmember')->where('rpm_token', $token)->where('rpm_email',$request->email)->first();

    	return view('frontpage.auth.lupa-password')->with([

    		'token' => $token,

    		'email' => $request->email,

    		'cek' => $cek,

    		'cektime' => $cektime,

    	]);

    }

    public function ganti_password_member(Request $request){

    	$email = $request->email;

    	$cek = DB::table('m_member')->where('cm_email',$email)->get();

    	DB::beginTransaction();

        try{

            if(count($cek) != 0){

            	if($request->passwordbaru == $request->confirmpassword){

            		DB::table('d_reset_passwordmember')->where('rpm_email',$email)->delete();

            		DB::table('m_member')->where('cm_email',$email)->update([

            			'password' => bcrypt($request->passwordbaru),

            		]);

            		DB::commit();

            		return response()->json([

            			'status' => 'sukses',

            		]);

            	}

                else{

            		return response()->json([

            			'status' => 'tidaksama',

            		]);

            	}

            	}

                else{

            	return response()->json([

            		'status' => 'tidakada',

            	]);

            }
            
        }

        catch (\Exception $e) {

            DB::rollBack();

            throw $e;

            return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);

            } catch (\Throwable $e) {

            DB::rollBack();

            throw $e;

            return response()->json(['status' => 'Error', 'message' => 'Hubungi Pengembang Software']);

            }

	}

}
