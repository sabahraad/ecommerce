<?php

namespace App\Http\Controllers;
use App\Models\customer;
use Illuminate\Http\Request;

class customersController extends Controller
{
    
    public function index()
    {
        return view('registration');
    }

    public function login()
    {
        return view('login');
    }

    public function product()
    {
        return view('product');
    }
   
    public function loginCheck(Request $request)
    {

        $cus_email = $request->input('cus_email');
        $password = $request->input('password');

        // dd($cus_email, $password);
        
        if(customer::where('cus_email', $cus_email)->where('password',$password)->exists()){

            echo ("hi");
            return view('product');
        }

    }

    
    public function store(Request $request)
    {
        $re = new customer;
        $cus_name = $request->input('cus_name');
        $cus_email = $request->input('cus_email');
        $password = $request->input('password');
        $cpassword = $request->input('cpassword');

        if($password != $cpassword){
            echo "Please Give Correct Password";

            return view('registration');

        }else{

            $re->cus_name = $cus_name;
            $re->cus_email = $cus_email;
            $re->password = $password;
            $re->save();

            return view('login');

        }


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
