<?php 
namespace App\Services;

use Illuminate\Support\Facades\Storage;

class AuthService extends BaseService
{
    public function login($email, $password){
        $result = $this->request_service->setMethod("post")
        ->setApiMethod("token")
        ->setBody([
            "email" => $email,
            "password" => $password
        ])
        ->send();
           
        if($result["isSuccess"]){
            session()->put("accessToken", $result["data"]->token_key);
            session()->put("tokenExpiresAt", $result["data"]->expires_at);
            session()->put("refreshTokenKey", $result["data"]->refresh_token_key);
            session()->put("refreshTokenExpiresAt", $result["data"]->refresh_expires_at);
            session()->put("user", $result["data"]->user);

            file_put_contents(public_path("accessToken.txt"), $result["data"]->token_key);
        }

        return $result["isSuccess"];
    }

    public function logout(){
        session()->forget("accessToken");
        session()->forget("tokenExpiresAt");
        session()->forget("refreshTokenKey");
        session()->forget("refreshTokenExpiresAt");
        session()->forget("user");
    }
}
