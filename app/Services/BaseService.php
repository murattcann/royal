<?php 

namespace App\Services;

use App\Utils\ApiRequest\ApiRequest;

class BaseService
{
    protected $request_service; 
    
    public function __construct()
    {
        $this->request_service = new ApiRequest;
    }
}
