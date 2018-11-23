<?php

namespace Kris\LaravelFormBuilder;
use App\Http\Controllers\Controller;
class FormController extends Controller
{
    public function send(FormBuilder $builder){
        $model_class=  request('model');
//        return response(['data'=>$model_class]);
        $form = $builder->create($model_class);
        if (!$form->isValid()) {
            return response(['success'=>false,'message'=>'something go wrong']);
            return response()->withErrors($form->getErrors())->withInput();
        }
        $success = $form->submit(request());
        if($success){
            return response(['success'=>true,'message'=>'success']);
        }else{
            return response(['success'=>false,'message'=>'something go wrong']);
        }
    }
}