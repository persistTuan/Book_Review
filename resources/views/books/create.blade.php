@extends("layouts.app")

@section("title", "create Book")

@section("content")
@if(count($errors->all()))
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
</div>
@endif
<form class="w-70 d-flex justify-content-center container-fluid " class="mx-5" method="post" action="{{route('book.store')}}" enctype="multipart/form-data">
    @csrf
    {{csrf_field()}}
 
    <div class="row w-100">
        <div class="content col d-flex flex-column align-content-center mx-auto">
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Title</strong></label>
                <div class="col-sm-10">
                    <input name="title" type="input" value="{{old('title')}}" class="form-control" id="name">
                    @if($errors->has("title"))
                    <span class="my-3" style="color:red; ">Không được để trống</span>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Author</strong></label>
                <div class="col-sm-10">
                    <input name="author" type="input" value="{{old('author')}}" class="form-control" id="name">
                    @if($errors->has("author"))
                    <span class="my-3" style="color:red; ">Bắt buộc và không chứa ký tự số</span>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>Genre</strong></label>
                <div class="col-sm-10">
                    <input name="genre" type="input" value="{{old('genre')}}" class="form-control" id="name">
                    @if($errors->has("genre"))
                    <span class="my-3" style="color:red; ">Bắt buộc và không chứa kí tự số</span>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>publicationYear</strong></label>
                <div class="col-sm-10">
                    <input name="publicationYear" type="input" value="{{old('publicationYear')}}" class="form-control" id="name">
                    @if($errors->has("publicationYear"))
                    <span class="my-3" style="color:red; ">Bắt buộc và là số năm</span>
                    @endif
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label"><strong>ISBN</strong></label>
                <div class="col-sm-10">
                    <input name="ISBN" type="input" value="{{old('ISBN')}}" class="form-control" id="name">
                    @if($errors->has("ISBN"))
                    <span class="my-3" style="color:red; ">Bắt buộc và có định dạng (ISBN-12_số)</span>
                    @endif
                </div>
            </div>
            <div class="mb-3 ">
                <!-- <label for="exampleInputEmail1" class="form-label">Choose file</label> -->
                <input accept="image/jpeg, image/png, image/svg, image/gif" value="old('image')" type="file" name="image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <span>Accept: jpeg, png, svg, gif</span>
                @if($errors->has("image"))
                    <span class="my-3" style="color:red; ">Image là bắt buộc</span>
                @endif
            </div>
            <button name="submit_eidtAuthor" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    
</form>



@endsection