<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Model;


class BackEndController extends Controller
{



    // $this->model = User
	
    
	    protected $model;



	 public function __construct(Model $model)
    {
        $this->model = $model;
    }



   


    public function index()
    {
    	$rows = $this->model;
        $rows = $this->filter($rows);
        $with = $this->with();
        if (!empty($with)) {
            $rows = $rows->with($with);
        }
        $rows = $rows->paginate(10);



        $moduleName  = $this->pluarlModelName();
        $routeName = $this->getClassNameFromModel();
        $sModelName = $this->getModelName();
        $pageTitle = 'Control '.$moduleName;
        $pagesDes = 'Here You Can Add/Edit/Delete '.$moduleName;

    	

    	return view('back_end.'.$this->getClassNameFromModel().'.index' , 
            compact('rows','moduleName','pageTitle','pagesDes' , 'sModelName' , 'routeName'));
    }


    public function create()
    {
        $moduleName  = $this->getModelName();
        $pageTitle = 'Create ' .$moduleName;
        $pagesDes = 'Here You Can Add '.$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();


    	    return view('back_end.'.$folderName.'.create' , 
                compact('moduleName' , 'pageTitle' , 'pagesDes' , 'folderName' , 'routeName'))->with($append);
    }

     public function destroy($id)
    {
        

        $this->model->findOrFail($id)->delete();

        return redirect()->route($this->getClassNameFromModel().'.index');


    }
     public function edit($id)
    {
        $row = $this->model->findOrFail($id);

        $moduleName  = $this->getModelName();
        $pageTitle = 'Edit ' .$moduleName;
        $pagesDes = 'Here You Can Edit '.$moduleName;
        $folderName = $this->getClassNameFromModel();
        $routeName = $folderName;
        $append = $this->append();

        return view('back_end.'.$folderName.'.edit' , 
            compact('row' , 'moduleName','pageTitle','pagesDes' , 'folderName' ,'routeName'))->with($append);
    }


        protected function filter($rows)
        {
           return $rows;
        }



       protected function with(){
        return [] ;
       } 

	

    //  get the $this->mode name and samll , pluar

    protected  function getClassNameFromModel(){

    	 return strtolower($this->pluarlModelName());

    }
    

    protected function pluarlModelName()
    {
        return  str_plural($this->getModelName());
    }

    protected function getModelName()
    {
        return class_basename($this->model) ;
    }

    protected function append(){
        return [];
    }

}