@extends("layout")
@section("pageTitle", "Home")
@section("content")
<div class="row justify-content-center d-flex align-items-center mt-5">
    <div class="col-sm-12">
       
        <div class="card" >
            <div class="card-header">
                Quick Links
            </div>
            <div class="card-body">
                <div class="col-sm-6">
                    <a href="{{route("authors.index")}}">Authors</a>
                </div>
                <div class="col-sm-6">
                    <a href="{{route("books.index")}}">Books</a>
                </div>
            </div>     
        </div>
      
    </div>
</div>
@endsection