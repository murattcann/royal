<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Release Date</th>
                <th>ISBN</th>
                <th>Format</th>
                <th>Number Of Pages</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{$loop->index + 1 }}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->release_date}}</td>
                    <td>{{$book->isbn}}</td>
                    <td>{{$book->format}}</td>
                    <td>{{$book->number_of_pages}}</td>
                    <td>
                        <button type="button" class="btn btn-outline-danger deleteBook" data-form="#deleteBookForm-{{$book->id}}">
                            Delete
                        </button>
                        <form class="d-none" method="POST" action="{{route("books.delete", ["bookId" => $book->id])}}" id="deleteBookForm-{{$book->id}}">
                            @csrf
                            @method("DELETE")

                        </form>    
                    </td>
                    
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        <div class="alert alert-warning">
                            There is no book yet.
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
        
    </table>
</div>