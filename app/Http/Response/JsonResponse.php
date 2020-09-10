<?php
    namespace App\Http\Response;

    trait JsonResponse{
        public function success($message='',$data=[]){
            return $this->JsonResponse('0',$message,$data);
        }
        public function error($message='',$data=[]){
            return $this->JsonResponse('-1',$message,$data);
        }
        public function JsonResponse($code,$message,$data=[]){
            $data = [
                "code"=>$code,
                "message"=>$message,
                "data"=>$data
            ];
            return response()->json($data);
        }
    }



