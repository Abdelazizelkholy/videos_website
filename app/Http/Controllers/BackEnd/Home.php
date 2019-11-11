<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\User;
use App\Models\Comments;


class Home extends BackEndController
{

	public function __construct(User $model)
    {
        parent::__construct($model);
    }

    	 public function index(){
        $comments = Comments::with('user' , 'video')->orderby('id' , 'desc')->paginate(20);
        return view('back_end.home' , compact('comments'));
    }
}
