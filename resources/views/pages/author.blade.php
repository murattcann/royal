@extends("layout")
@section("pageTitle", "Author")
@section("content")
<div class="row justify-content-center d-flex align-items-center mt-5">
    <div class="col-sm-12">
       
        <div class="card" >
            <div class="card-header">
                {{ $author->first_name. " ". $author->last_name}}
                @if(count($author->books)<=0)
                    <button type="button" class="btn btn-danger deleteAuthor" style="float: right" data-form="#deleteAuthorForm-{{$author->id}}">Delete Author</button>
                    <form action="{{route("authors.delete", ["authorId" => $author->id])}}" method="POST" id="deleteAuthorForm-{{$author->id}}" class="d-none">
                        @csrf
                        @method("DELETE")
                    </form>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>First Name</td>
                                    <td>{{ $author->first_name}}</td>
                                </tr>
                                <tr>
                                    <td>Last Name</td>
                                    <td>{{ $author->last_name}}</td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>{{ $author->gender}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Birth Date</td>
                                    <td>{{ $author->birthday}}</td>
                                </tr>
                                 <tr>
                                    <td>Biography</td>
                                    <td>
                                        <p>{{ $author->biography }}</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-sm-12 text-center">
                        <h4>Books Of {{ $author->first_name. " ". $author->last_name}}</h4>
                    </div>
                    <div class="col-sm-12">
                       @include("components.books-table", ["books" => $author->books])
                    </div>
                </div>
            </div>     
        </div>
      
    </div>
</div>
@endsection