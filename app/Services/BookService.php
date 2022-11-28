<?php 
namespace App\Services;

class BookService extends BaseService
{
    public function getAll(){
        $result = $this->request_service->setMethod("GET")
        ->setApiMethod("books")
        ->setHeaders([
            "Authorization" => "Bearer ".session("accessToken")
        ])
        ->send();
        
        return $result["data"];
    }

    /**
     * @param int $bookId
     */
    public function findById(int $bookId){
        $result = $this->request_service->setMethod("GET")
        ->setApiMethod("books/$bookId")
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
      
     
        $result = $this->request_service->setMethod("POST")
        ->setApiMethod("books")
        ->setBody($data)
        ->setHeaders([
            "Authorization" => "Bearer ".session("accessToken")
        ])
        ->send();
        
    
        return $result["isSuccess"] || false;
    }

    /**
     * @param int $bookId
     */
    public function delete(int $bookId){
      
     
        $result = $this->request_service->setMethod("DELETE")
        ->setApiMethod("books/$bookId")
        ->setHeaders([
            "Authorization" => "Bearer ".session("accessToken")
        ])
        ->send();
         
        return $result["isSuccess"] || false;
    }
}
