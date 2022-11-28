<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private AuthorService $service;

    public function __construct()
    {
        $this->service = new AuthorService();
    }
    public function index(){
 
        $authors = $this->service->getAll();
         
        return view("pages.authors", ["authors" => $authors]);
    }

    public function detail($authorId){
        $author = $this->service->findById($authorId); 

        return view("pages.author", ["author" => $author]);
    }

    public function delete($authorId){ 
        $deleted = $this->service->delete($authorId);
         
        if($deleted){
            return redirect()->route("authors.index")->with("success", "Author is deleted successfully!");
        }

        return redirect()->route("authors.index")->with("error", "Something went wrong...");
        
    }
}
