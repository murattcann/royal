<?php 
namespace App\Services;

class AuthorService extends BaseService
{
    public function getAll(){
        $result = $this->request_service->setMethod("GET")
        ->setApiMethod("authors")
        ->setHeaders([
            "Authorization" => "Bearer ".session("accessToken")
        ])
        ->send();
        
        return $result["data"];
    }

    /**
     * @param int $authorId
     */
    public function findById(int $authorId){
        $result = $this->request_service->setMethod("GET")
        ->setApiMethod("authors/$authorId")
        ->setHeaders([
            "Authorization" => "Bearer ".session("accessToken")
        ])
        ->send();
        
        return $result["data"];
    }

     /**
     * @param array $data
     */
    public function store(array $data){
      
     
       $accessToken = !app()->runningInConsole() ? session("accessToken") : file_get_contents(public_path("accessToken.txt"));
        $result = $this->request_service->setMethod("POST")
        ->setApiMethod("authors")
        ->setBody($data)
        ->setHeaders([
            "Authorization" => "Bearer ".$accessToken
        ])
        ->send();
        
    
        return $result["isSuccess"] || false;
    }

    /**
     * @param int $authorId
     */
    public function delete(int $authorId){
        $result = $this->request_service->setMethod("DELETE")
        ->setApiMethod("authors/$authorId")
        ->setHeaders([
            "Authorization" => "Bearer ".session("accessToken")
        ])
        ->send();
         
        return $result["isSuccess"] || false;
    }

}
