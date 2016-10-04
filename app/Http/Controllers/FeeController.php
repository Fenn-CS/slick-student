<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Fee;

class FeeController extends Controller
{
    //
    public function addNewFee(Request $request)
    {
      $name = $request['name'];
      $installments = $request['installments'];
      $minimum = $request['minimum'];
      $total = $request['total'];
      $problems ='';
       if($name==''){
        $problems .='<ul><li>You must provide fee name</li>';	
        }if($minimum==''){
         $problems .='<li>You must provide minium acceptable</li>';  	
        }if($installments==''){
         $problems .='<li>You must provide number of acceptable installments</li>';  	
        }if($total==''){
         $problems .='<li>You must provide total amount for fee</li></ul>';  	
        }
       if($problems!=''){
       return ['success'=>false,'message'=>'Fee not added due to the following <br>'.$problems];
       }
        $fee = new Fee();
       	$fee->name = $name;
       	$fee->installments = $installments;
       	$fee->minimum = $minimum;
       	$fee->total = $total;
       try {

          $fee->save();
       }catch(\Illuminate\Database\QueryException $ex){ 

       return ['success'=>false,'message'=>'An unexpected error occured, this record may already exist.'.$ex->getMessage()];
       // Note any method of class PDOException can be called on $ex.
        }

  return ['success'=>true,'message'=>'The '.$name.' successfully added','reset'=>'#form-fee-operations'];
    }

     public function getFees()
     {
      $fees = Fee::all();
      return $fees;
     }
}
