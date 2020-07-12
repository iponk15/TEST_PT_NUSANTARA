<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use GuzzleHttp\Client;
use Validator;
use DB;

class CustomerController extends Controller
{

    public function showAllCustomers()
    {
        return response()->json(Customer::all());
    }

    public function showOneCustomer($id)
    {
        try{
           $getCust = Customer::find($id);
           
           if(!empty($getCust)){
                $respon  = TRUE;
                $message = "Data successfully retrieved";
                $code    = 200;
            }else{
                $respon  = FALSE;
                $message = "Data not found";
                $code    = 404;
            }

           return res($respon, $message, $code, $getCust);
        } catch (\Exception $e) {
            DB::rollback();

            $param = [
                'param' => NULL,
                'error' => $e,
                'path'  => NULL,
            ];

            return res(FALSE, $param, 405);
        }
    }

    public function create(Request $request)
    {   
        $post      = $request->input();
        $validator = Validator::make($post,
            [
                'customer_name'     => 'required',
                'customer_email'    => 'required|unique:customer|email',
                'customer_password' => 'required',
                'customer_gender'   => 'required',
                'customer_menikah'  => 'required',
                'customer_address'  => 'required'
            ],
            [
                'customer_name.required'     => 'Name cant blank',
                'customer_email.required'    => 'Email cant blank',
                'customer_email.unique'      => 'Email is being used',
                'customer_email.email'       => 'Email Input must be email type',
                'customer_password.required' => 'Password cant blank',
                'customer_gender.required'   => 'Gender harus diisi',
                'customer_menikah.required'  => 'Is Merried cant blank',
                'customer_address.required'  => 'Address cant blank',
            ]
        );  

        if($validator->fails()){
            $validator = $validator->errors()->messages();                    
            foreach ($validator as $key => $value) {
                $error[$key] = $value[0];
            }

            return res(FALSE, $error, 405);
        }

        DB::beginTransaction();

        try{
            $Customer = Customer::create($post);

            DB::commit();

            return res(TRUE, "Data saved successfully", 201, $post);
        } catch (\Exception $e) {
            DB::rollback();

            $param = [
                'param' => $post,
                'error' => $e,
                'path'  => $request->path(),
            ];

            return res(FALSE, $param, 405);
        }
    }

    public function update($id, Request $request)
    {
        $post      = $request->input();
        $validator = Validator::make($post,
            [
                'customer_name'     => 'required',
                'customer_email'    => 'required|email',
                'customer_gender'   => 'required',
                'customer_menikah'  => 'required',
                'customer_address'  => 'required'
            ],
            [
                'customer_name.required'     => 'Name cant blank',
                'customer_email.required'    => 'Email cant blank',
                'customer_email.unique'      => 'Email is being used',
                'customer_email.email'       => 'Email Input must be email type',
                'customer_gender.required'   => 'Gender harus diisi',
                'customer_menikah.required'  => 'Is Merried cant blank',
                'customer_address.required'  => 'Address cant blank',
            ]
        );  

        if($validator->fails()){
            $validator = $validator->errors()->messages();                    
            foreach ($validator as $key => $value) {
                $error[$key] = $value[0];
            }

            return res(FALSE, $error, 405);
        }

        DB::beginTransaction();

        try{
            if($post['customer_password'] != ''){
                $dtPost['customer_password'] = $post['customer_password'];
            }

            $dtPost['customer_name']    = $post['customer_name'];
            $dtPost['customer_email']   = $post['customer_email'];
            $dtPost['customer_gender']  = $post['customer_gender'];
            $dtPost['customer_menikah'] = $post['customer_menikah'];
            $dtPost['customer_address'] = $post['customer_address'];

            Customer::where('customer_id', $id)->update($dtPost);

            DB::commit();

            return res(TRUE, "Data update successfully", 200, $dtPost);
        } catch (\Exception $e) {
            DB::rollback();

            $param = [
                'param' => $post,
                'error' => $e,
                'path'  => $request->path(),
            ];

            return res(FALSE, $param, 405);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try{
            $cekCust = Customer::where('customer_id', $id)->first();
            if(empty($cekCust)){
                $respon  = FALSE;
                $message = "Data not found";
                $code    = 204;
            }else{
                Customer::findOrFail($id)->delete();

                DB::commit();

                $respon  = TRUE;
                $message = "Deleted Successfully";
                $code    = 200;
            }
            
            
            return res($respon, $message, $code, $cekCust);
        } catch (\Exception $e) {
            DB::rollback();

            $param = [
                'param' => NULL,
                'error' => $e,
                'path'  => NULL,
            ];

            return res(FALSE, $param, 405);
        }
    }

    function listCust(){
        $data = [
            'customer' => Customer::all()
        ];

        return view('Customer.index', $data);
    }

    function storecust(Request $respon){
        echo 'hallo';
    }
}