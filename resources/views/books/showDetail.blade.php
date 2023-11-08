@extends("layouts.app")

@section("title", "detail detailBook[0]")

@section("content")
<form class="w-70 d-flex justify-content-center container-fluid " action="{{route('book.review',$detailBook[0]->BookID )}}" class="mx-5">
    @csrf
    <div class="row w-100">
        <div style="background-color: #CBCBCB;" class="image rounded-3 col-4 d-flex justify-content-center align-items-center flex-column">
            @if($check_PathImage)
            <img src="{{asset('/storage/'. $detailBook[0]->coverImageURL)}}" class="img-fluid border-danger border-3" alt="ẢNH ĐANG Ở ĐÂY">
            @else
            <img src="{{asset('/storage/images/user.png')}}" class="img-fluid border-danger border-3" alt="ẢNH ĐANG Ở ĐÂY">
            @endif
        </div>

        <div class="content col-8 d-flex flex-column align-content-center mx-auto">
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label"><strong>Book ID</strong></label>
                <div class="col-sm-10">
                    <input readonly name="bookID" type="input" value="{{$detailBook[0]->BookID}}" class="form-control" id="id">

                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Title</strong></label>
                <div class="col-sm-10">
                    <input readonly name="title" type="input" value="{{$detailBook[0]->title}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Author</strong></label>
                <div class="col-sm-10">
                    <input readonly name="author" type="input" value="{{$detailBook[0]->author}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Genre</strong></label>
                <div class="col-sm-10">
                    <input readonly name="genre" type="input" value="{{$detailBook[0]->genre}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>publicationYear</strong></label>
                <div class="col-sm-10">
                    <input readonly name="publicationYear" type="input" value="{{$detailBook[0]->publicationYear}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>ISBN</strong></label>
                <div class="col-sm-10">
                    <input readonly name="ISBN" type="input" value="{{$detailBook[0]->ISBN}}" class="form-control" id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>ReviewsID</strong></label>
                <div class="col-sm-10">
                    <select name="selectReviewID" id="selectReviewID">
                        @foreach($detailBook as $detailBookReviewID)
                            @php
                                $selected = "";
                                if($review != null && $review->ReviewID == $detailBookReviewID->ReviewID)
                                    $selected = "selected";
                            @endphp
                            <option {{$selected}} value="{{$detailBookReviewID->ReviewID}}">{{$detailBookReviewID->ReviewID}}</option>
                        @endforeach

                    </select>
                    <button name="submit_eidtAuthor" type="submit" class="btn btn-primary btn-sm">See</button>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Review</strong></label>
                <div class="col-sm-10">
                    @if(isset($review))
                    <textarea readonly style="width:100%" name="" id="" cols="70" rows="10">{{$review->revewText}}</textarea>
                    @else
                    <textarea readonly style="width:100%" name="" id="" cols="70" rows="10">{{$detailBook[0]->revewText}}</textarea>
                    @endif
                </div>
            </div>
        </div>
    </div>


</form>

@endsection