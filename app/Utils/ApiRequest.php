<?php 

namespace App\Utils\ApiRequest;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Log;

class ApiRequest
{
    /**
     * @var string
     */
    private string $apiUrl = "https://symfony-skeleton.q-tests.com/api/v2/";

    /**
     * @var string
     */
    private string $apiMethod = "apiMethod";

    /**
     * @var array|null
     */
    private array|null $body;

    /**
     * @var array|null
     */
    private array|null $headers = ['content-type' => 'application/json'];

    /**
     * @var string
     */
    private string $method = "GET";
 
    /**
     * This method is used to send request to API and make the request more secure
     */
    public  function send(){
        
      
        try {
            $client = new Client([
                'headers' => $this->getHeaders()
            ]);
            $result = $client->request($this->getMethod(), $this->apiUrl.$this->getApiMethod(),[
                "json" => !empty($this->body) ? $this->getBody() : []
            ]);
             
            return $this->prepareResponse($result);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }

    public function prepareResponse(Response $response){
        return [
            "isSuccess" => in_array($response->getStatusCode(), [100, 200, 201, 202, 204]) ? true:false,
            "data" => json_decode($response->getBody())
        ];
    }

    /**
     * Get the value of headers
     *
     * @return  array|null
     */ 
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set the value of headers
     *
     * @param  array|null  $headers
     *
     * @return  self
     */ 
    public function setHeaders(array $headers)
    {

        $this->headers = array_merge(['content-type' => 'application/json'], $headers);

        return $this;
    }

    /**
     * Get the value of method
     *
     * @return  string
     */ 
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set the value of method
     *
     * @param  string  $method
     *
     * @return  self
     */ 
    public function setMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get the value of body
     *
     * @return  array|null
     */ 
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set the value of body
     *
     * @param  array|null  $body
     *
     * @return  self
     */ 
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get the value of apiMethod
     *
     * @return  string
     */ 
    public function getApiMethod()
    {
        return $this->apiMethod;
    }

    /**
     * Set the value of apiMethod
     *
     * @param  string  $apiMethod
     *
     * @return  self
     */ 
    public function setApiMethod(string $apiMethod)
    {
        $this->apiMethod = $apiMethod;

        return $this;
    }
}
