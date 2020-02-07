<?php

namespace App\Http\Controllers;

use RSAHelp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\M_users;

class C_users extends Controller
{
    //
    public function index(){
    	return view('folder/users/index');
    }


    public function data(Request $request){
        $response = array();
        $response['code']  = 200;
        $response['draw']  = $request->input("draw");

		if (strlen($request->input("search.value")) > 0) {
			$search            = $request->input("search.value");
			$response['count'] = M_users::
			whereRaw(" 
				(LOWER(`first_name`) LIKE '%".trim(strtolower($search))."%') 
				OR (LOWER(`last_name`) LIKE '%".trim(strtolower($search))."%') 
				OR (LOWER(`email`) LIKE '".trim(strtolower($search))."%') 
			")
			->count();
			$query             = M_users::
			whereRaw(" 
				(LOWER(`first_name`) LIKE '%".trim(strtolower($search))."%') 
				OR (LOWER(`last_name`) LIKE '%".trim(strtolower($search))."%') 
				OR (LOWER(`email`) LIKE '".trim(strtolower($search))."%') 
			")
			->skip($request->input('start'))
			->take($request->input('length'))
			->get();
		}else{
			$response['count'] = M_users::count();
			$query             = M_users::
			skip($request->input('start'))
			->take($request->input('length'))
			->get();
		}

        $response['data'] = array();
        $response['recordsFiltered'] = $response['count'];
        $response['recordsTotal']    = $response['count'];
        if ($query->count() == 0){
            $response['code'] = 401;
        }else{
            $response['data']            = $query;
        }
        echo json_encode($response);
    }

    public function create(Request $request){
  		DB::beginTransaction();
  		$response 	= array();
    	$parameter 	= array();
    	parse_str(RSAHelp::decrypte()['parameter'], $parameter);
  		$response['code'] 		= 200;
  		$response['message'] 	= $parameter['first_name']." ".$parameter['last_name']." berhasil di tambahkan";

	  		$parameter['id'] = $this->get_last_id();
	  		$query = new M_users;
	  		$query->id 			= $parameter['id'];
	  		$query->first_name 	= $parameter['first_name'];
	  		$query->last_name 	= $parameter['last_name'];
	  		$query->address 	= $parameter['address'];
	  		$query->phone 		= $parameter['phone'];
	  		$query->email 		= $parameter['email'];
	  		$query->deleted_at 	= null;
	  		$query = $query->save();

	  		if ($query === false || $query == 0) {
	  			$response['code'] = 401;
	  			$response['message'] 	= $parameter['first_name']." ".$parameter['last_name']." tidak berhasil di tambahkan";
	  		}else{
	  			$response['id'] = $parameter['id'];
	  		}

		if ($response['code']==200) {
			DB::commit();
		}else{
			DB::rollBack();
		}

 	   	echo json_encode($response);
    }

    public function update(Request $request){
  		DB::beginTransaction();
  		$response 	= array();
    	$parameter 	= array();
    	parse_str(RSAHelp::decrypte()['parameter'], $parameter);

  		$response['code'] 		= 200;
  		$response['message'] 	= $parameter['first_name']." ".$parameter['last_name']." berhasil di perbarui";

  		$query 		= M_users::where('id', $parameter['id'])->get();
  		if ($query->count() == 0) {
	  		$response['code'] 		= 401;
	  		$response['message'] 	= "Data tidak di temukan";
  		}else if (strlen($parameter['email']) == 0) {
  			$response['code'] 		= 401;
  			$response['message'] 	= "Email yang anda masukkan kosong";
  		}else{
  			$validate 	= M_users::
  			where('email', $parameter['email'])
  			->get();
  			if ($validate->count() > 0) {
  				if ($validate[0]->id != $parameter['id']) {
			  		$response['code'] 		= 401;
			  		$response['message'] 	= "Email sudah digunakan";
  				}
  			}
	  		$query = M_users::find($parameter['id']);
	  		$query->id 			= $parameter['id'];
	  		$query->first_name 	= $parameter['first_name'];
	  		$query->last_name 	= $parameter['last_name'];
	  		$query->address 	= $parameter['address'];
	  		$query->phone 		= $parameter['phone'];
	  		$query->email 		= $parameter['email'];
	  		$query->deleted_at 	= null;
	  		$query = $query->save();

	  		if ($query === false || $query == 0) {
	  			$response['code'] = 401;
	  			$response['message'] 	= $parameter['first_name']." ".$parameter['last_name']." tidak berhasil di perbarui";
	  		}
  		}


		if ($response['code']==200) {
			DB::commit();
		}else{
			DB::rollBack();
		}

 	   	echo json_encode($response);
    }

    public function delete(Request $request){
  		DB::beginTransaction();
  		$response 	= array();
    	$parameter 	= array();
  		$response['code'] 		= 200;
  		$response['message'] 	= "Data berhasil di hapus";

    	parse_str(RSAHelp::decrypte()['parameter'], $parameter);

    	$query = M_users::where('id', $parameter['id'])->get();
    	if ($query->count() > 0) {
    		$query = M_users::find($parameter['id']);
	    	$query = $query->delete();
	    	if ($query == 0 || $query === false ) {
	    		$response['code'] 		= 401;
	  			$response['message'] 	= "Data gagal di hapus";
	    	}
    	}else{
	    	$response['code'] 		= 401;
	  		$response['message'] 	= "Data tidak ditemukan";
    	}

		if ($response['code']==200) {
			DB::commit();
		}else{
			DB::rollBack();
		}

 	   	echo json_encode($response);
    }
    
    public function get_form($id = null){
		$response               = array();
		$response['id']         = "";
		$response['first_name'] = "";
		$response['last_name']  = "";
		$response['address']    = "";
		$response['phone']      = "";
		$response['email']      = "";
    	$query = M_users::where('id', $id)->get();
    	if ($query->count() > 0) {
			$response['id']         = $query[0]->id;
			$response['first_name'] = $query[0]->first_name;
			$response['last_name']  = $query[0]->last_name;
			$response['address']    = $query[0]->address;
			$response['phone']      = $query[0]->phone;
			$response['email']      = $query[0]->email;
    	}

    	return view('folder/users/form', $response);
    }

    private function get_last_id(){
		$last_id    = M_users::find(M_users::max('id'));

		if ($last_id !== null) {
			$last_id = $last_id->id + 1;
		}else{
			$last_id = 1;
		}
		return $last_id;
    }
}
