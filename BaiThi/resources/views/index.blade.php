<!DOCTYPE html>
<html>
<head>
    <base href="{{asset('/')}}">
    <title>List Furniture</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="front/css/style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="top_19">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="row">
                <div class="col">
                    <h2>Thêm Sản Phẩm Mới</h2>
                </div>
                <div class="col-md-auto">
                    <form action="/search" method="get">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-prepend">
                                <br>
                                <button type="submit" class="btn btn-primary">Search</button>
                            </span>
                    </form>
                </div>

            </div>
            <form action="{{route('store')}}" method="post" class="form_19">
                @csrf
                <h5 class="text_19">Điền thông tin sản phẩm</h5>
                <div class="row1">
                    <div class="row">
                        <div class="col">
                            <label for="id_card"><span>Mã sản phẩm:</span></label><br>
                            <input type="text" name="product_code" required="required" placeholder="Nhập mã sản phẩm">
                        </div>
                        <div class="col">
                            <label for="name"><span>Tên sản phẩm:</span></label><br>
                            <input type="text" name="name" required="required" placeholder="Nhập tên sản phẩm">
                        </div>
                        <div class="col">
                            <label for="name"><span>Giá:</span></label><br>
                            <input type="text" name="price" required="required" placeholder="Nhập giá sản phẩm">
                        </div>
                        <div class="col">
                            <label for="name"><span>Hình ảnh sản phẩm:</span></label><br>
                            <input type="image" name="avatar" required="required" placeholder="Ảnh minh họa sản phẩm">
                        </div>
                    </div>
                </div>

                <button class="btn btn-success" style="width: 100px; height:40px; margin-top: 20px">Đăng kí</button>
            </form>
        </div>
    </div>
    <br>
    <table class="table table-bordered" style="width: 1170px;margin-left: 120px;margin-top: 20px" >
        <thead>
        <tr>
            <th>Product Code</th>
            <th>Name</th>
            <th>Price</th>
            <th width="250">Avatar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->product_code}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->price}}</td>
                <td>{{$post->avatar}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


</body>
</html>

