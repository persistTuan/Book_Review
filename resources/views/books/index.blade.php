@extends("layouts.app")

@section("title", "Manager Book")

@section("content")

<div class="table-content ">
    @php
    use App\Models\Book;
    $message = session('message');
    $type = session('type');
    @endphp

    @if($message)
    <div class="alert alert-{{ $type }}">{{ $message }}</div>
    @endif
    <a class="btn btn-success mb-3" href="{{route('book.create')}}">Add New</a>
    <table class=" table table-striped  table-bordered">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">title</th>
                <th scope="col">author</th>
                <th scope="col">genre</th>
                <th scope="col">publicationYear</th>
                <th scope="col">ISBN</th>
                <th scope="col">coverImageURL</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>    
            @foreach($books as $book)
                @php $isTrashed = DB::table("books")->where('bookID', $book->bookID)->whereNotNull('deleted_at')->exists(); @endphp
                @if($isTrashed)
                    @continue 
                @endif
            <tr>
                <td style="word-wrap: break-word;" scope="row">{{$book->bookID}}</td>
                <td style="word-wrap: break-word;" scope="row">{{$book->title}}</td>
                <td style="word-wrap: break-word;" scope="row">{{$book->author}}</td>
                <td style="word-wrap: break-word;" scope="row">{{$book->genre}}</td>
                <td style="word-wrap: break-word;" scope="row">{{$book->publicationYear}}</td>
                <td style="word-wrap: break-word;" scope="row">{{$book->ISBN}}</td>
                <td style="word-wrap: break-word;" scope="row">{{$book->coverImageURL }}</td>
                <td class="d-flex justify-content-between align-items-center" role="group">
                    <a class="btn btn-primary me-2" href="{{route('book.review', $book->bookID)}}"><i class="fa-solid fa-circle-info"></i></a>
                    <a class="btn btn-warning me-2" href="{{route('book.edit', $book->bookID)}}"><i class="fa-solid fa-pen-to-square"></i></a>
                    <button type="button" class="btn btn-danger border-0" data-bs-toggle="modal" data-bs-target="#modalId{{$book->bookID}}"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>

            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <form method="post" action="{{route('book.destroy', $book->bookID)}}">
                @csrf
                @method('delete')
                <div class="modal fade" id="modalId{{$book->bookID}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want delete this....?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            @endforeach
            <!-- Optional: Place to the bottom of scripts -->
            <script>
                const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
            </script>

        </tbody>
    </table>    
    
</div>
<div class="container-fluid">
        {{$books->links()}}
</div>
@endsection