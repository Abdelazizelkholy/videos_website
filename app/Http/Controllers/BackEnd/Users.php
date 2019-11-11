<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;

use App\Models\User;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;





class Users extends BackEndController
{



	public function __construct(User $model)
    {
        parent::__construct($model);
    }




    public function store(Store $request)
    {
        $requestarray = $request->all();
        $requestarray['password'] = Hash::make($requestarray['password']);

    	  $this->model->create($requestarray);

    	 return redirect()->route('users.index');

    }


   


    public function update($id ,Update $request )
    {
    	$row = $this->model->findOrFail($id);


        $requestarray = $request->all();

        if (isset($requestarray['password']) &&  $requestarray['password'] != '' ) {
            
           $requestarray['password'] = Hash::make($requestarray['password']);
        }else{
            unset($requestarray['password']);
        }


        $row->update($requestarray);

                     return redirect()->route('users.edit' , $row->id);

    }




/*

    	$requestarray = [
    		'name' => $request->name,
            'email' => $request->email,
    	];

    		//  if the password existed and not empty  make  this if 

    	if (request()->has('password') &&  request()->get('password') != '' ) {
    		
    		$requestarray = $requestarray + [ 'password' => Hash::make($request->password) ];
    	}


    	$row->update($requestarray);

    		    	 return redirect()->route('users.edit' , $row->id);

    }

  */ 
}
