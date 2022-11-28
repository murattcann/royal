@extends("layout")
@section("pageTitle", "Authors")
@section("content")
<div class="row justify-content-center d-flex align-items-center mt-5">
    <div class="col-sm-12">
       
        <div class="card" >
            <div class="card-header">
                Authors List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Author Name</th>
                                <th>Gender</th>
                                <th>Birthday</th>
                                <th>Place Of Birth</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($authors->items as $author)
                                <tr>
                                    <td>{{$loop->index + 1 }}</td>
                                    <td>{{$author->first_name . " ". $author->last_name}}</td>
                                    <td>{{$author->gender}}</td>
                                    <td>{{$author->birthday}}</td>
                                    <td>{{$author->place_of_birth}}</td>
                                    <td>
                                        <a href="{{route("authors.detail",["authorId" => $author->id])}}" class="btn btn-outline-success">
                                            Show Author
                                        </a>    
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <div class="alert alert-warning">
                                            There is no author yet.
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                </div>
            </div>     
        </div>
      
    </div>
</div>
@endsection