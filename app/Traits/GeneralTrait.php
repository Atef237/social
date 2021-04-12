<?php


namespace App\Traits;


trait GeneralTrait{


    public function returnSuccessMsg( $smg = "", $errorNumber = '1'){

        return[
            'status' => true,
            'errorNumber' => $errorNumber,
            'smg' => $smg,
        ];

    }

    public function returnData($msg = "", $key, $value){

        return response([
            'errorNumber' => '0',
            'msg' => $msg,
            $key => $value,
        ],200);

    }

    public function returnError( $errorNumber, $msg){

        return response([

            'errorNumber' => $errorNumber,
            'msg' => $msg,
        ],300);

    }



}
