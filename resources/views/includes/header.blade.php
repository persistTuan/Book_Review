<div class="header d-flex justify-content-between align-items-center p-4">
    <div class="container-left d-flex justify-content-between align-items-center">
        <img src="{{asset('/images/logo.png')}}" alt="ảnh logo" class="img-fluid">
        
        <ul class="nav">
            <li class="nav-item active">
                <a class="text-dark nav-link btn btn-success btn-dangNhap" href="{{route('book.index')}}">Book</a>
            </li>
        </ul>
    </div>
    <div class="container-right">
        <form action="">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="nội dung cần tìm"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-success" type="button" id="button-addon2">Button</button>
            </div>
        </form>
    </div>
</div>
