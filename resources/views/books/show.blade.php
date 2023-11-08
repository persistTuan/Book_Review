@extends("layouts.app")

@section("title", "detail detailBook[0]")

@section("content")
<form class="w-70 d-flex justify-content-center container-fluid "  class="mx-5"  enctype="multipart/form-data">
    
    <div class="row w-100">
        <div style="background-color: #CBCBCB;" class="image rounded-3 col-4 d-flex justify-content-center align-items-center flex-column">
            @if($check_PathImage)
            <img src="{{asset('/storage/'. $book->coverImageURL)}}" class="img-fluid border-danger border-3" alt="ẢNH ĐANG Ở ĐÂY">
            @else
            <img src="{{asset('/storage/images/user.png')}}" class="img-fluid border-danger border-3" alt="ẢNH ĐANG Ở ĐÂY">
            @endif
        </div>

        <div class="content col-8 d-flex flex-column align-content-center mx-auto">
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label"><strong>Book ID</strong></label>
                <div class="col-sm-10">
                    <input readonly name="bookID" type="input" value="{{$book->BookID}}" class="form-control" id="id">
                  
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Title</strong></label>
                <div class="col-sm-10">
                    <input readonly name="title" type="input" value="{{$book->title}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Author</strong></label>
                <div class="col-sm-10">
                    <input readonly name="author" type="input" value="{{$book->author}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Genre</strong></label>
                <div class="col-sm-10">
                    <input readonly name="genre" type="input" value="{{$book->genre}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>publicationYear</strong></label>
                <div class="col-sm-10">
                    <input readonly name="publicationYear" type="input" value="{{$book->publicationYear}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>ISBN</strong></label>
                <div class="col-sm-10">
                    <input readonly name="ISBN" type="input" value="{{$book->ISBN}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>ReviewsID</strong></label>
                <div class="col-sm-10">
                    <select name="selectReviewID" id="selectReviewID">
                            <option disabled selected>No Result</option>
                    </select>
                    <button name="submit_eidtAuthor" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Review</strong></label>
                <div class="col-sm-10">
                    <textarea readonly style="width:100%" name="" id="" cols="70" rows="10">Không có bản review nào cho sách hiện tại </textarea>
                </div>
            </div>
        </div>
    </div>

    
</form>

@endsection