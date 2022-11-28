@extends("layout")
@section("pageTitle", "Books")
@section("content")
<div class="row justify-content-center d-flex align-items-center mt-2">
    <div class="col-sm-12">
       
        <div class="card" >
            <div class="card-header">
                Books List
                <a href="{{ route("books.create")}}" class="btn btn-outline-primary" style="float: right">+ Add New</a>
            </div>
            <div class="card-body">
                @include("components.books-table", ["books" => $books])
            </div>     
        </div>
      
    </div>
</div>
@endsection
 