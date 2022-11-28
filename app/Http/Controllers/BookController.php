<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\RequestSetter\BookRequestSetter;
use App\Services\AuthorService;
use App\Services\BookService; 
use Illuminate\Http\Request;

class BookController extends Controller
{
    private BookService $service;
    private AuthorService $authorService;
    private BookRequestSetter $bookRequest;

    public function __construct()
    {
        $this->service = new BookService();
        $this->authorService = new AuthorService();
        $this->bookRequest = new BookRequestSetter();
    }
    public function index(){
 
        $books = $this->service->getAll();
         
        return view("pages.books", ["books" => $books->items ?? []]);
    }


    public function create(){
 
        $authors = $this->authorService->getAll();
         
        return view("pages.create-book", ["authors" => $authors]);
    }


    public function store(BookRequest $request){      
        $this->bookRequest->setTitle($request->title);
        $this->bookRequest->setFormat($request->title);
        $this->bookRequest->setReleaseDate($request->release_date);
        $this->bookRequest->setDescription($request->description);
        $this->bookRequest->setNumberOfPages($request->number_of_pages);
        $this->bookRequest->setIsbn($request->isbn);
        $this->bookRequest->setAuthor(["id" => $request->authorId]);

        $store = $this->service->store($this->bookRequest->toArray());
        
        if($store){
            return redirect()->route("books.index")->with("success", "Book is added successfully!");
        }

        return redirect()->route("books.create")->with("error", "Something went wrong...");
    }

    public function delete($bookId){      
    
        $deleted = $this->service->delete($bookId);
         
        if($deleted){
            return redirect()->back()->with("success", "Book is deleted successfully!");
        }

        return redirect()->back()->with("error", "Something went wrong...");
    }
}
