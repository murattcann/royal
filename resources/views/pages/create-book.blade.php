@extends("layout")
@section("pageTitle", "Create New Book")
@section("content")
<div class="row justify-content-center d-flex align-items-center mt-2">
    <div class="col-sm-12">
       
        <div class="card" >
            <div class="card-header">
                Create New  Book
                <a href="{{ route("books.index") }}" class="btn btn-outline-primary" style="float: right">Go Back</a>
            </div>
            <div class="card-body">
                @include("components.errors")
                <form action="{{ route("books.store") }}" method="POST" class="row">
                    @csrf
                    @method("POST")
                    <div class="col-sm-3 mt-2">
                        <label> Author </label>
                        <select name="authorId" class="form-control form-select">
                            @foreach ($authors->items as $author)
                                <option value="{{$author->id}}">{{$author->first_name. " ". $author->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3 mt-2">
                        <label>Number Of Pages</label>
                        <input type="number" min="0" name="number_of_pages" class="form-control">
                    </div>
                    <div class="col-sm-6 mt-2">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="col-sm-4 mt-2">
                        <label>Release Date</label>
                        <input type="datetime-local" name="release_date" class="form-control">
                    </div>
                     <div class="col-sm-4 mt-2">
                        <label>ISBN</label>
                        <input type="text" name="isbn" class="form-control">
                    </div>
                    <div class="col-sm-4 mt-2">
                        <label>Format</label>
                        <input type="text" name="format" class="form-control">
                    </div>
                    
                    <div class="col-sm-12 mt-2">
                        <label> Description </label>
                        <textarea name="description" class="form-control" ></textarea>
                    </div>

                    <div class="col-sm-12 mt-3 text-center">
                        <button type="submit" class="btn btn-outline-success"> Save Book </button>
                    </div>
                </form>
            </div>     
        </div>
      
    </div>
</div>
@endsection