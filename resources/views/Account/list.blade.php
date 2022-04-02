@extends('layout')
@section('content')
<section class="section section-posts lighten-4 content">
    <div class="container action">
        <div class=" pb-0">
            <div class="header__pc">
                <div class="row title">
                    <div class="col-2">
                        <h5 class="card-title">Danh sách tài khoản</h5>
                    </div>
                    <div class="col-3"></div>
                    <div class="col-7">
                        <div class="row task" style="border-bottom: none">
                            <div class="text-right">
                                <a href="{{ route('account-add')}}"> <button class="btn-add"><i
                                            class="fas fa-plus"></i>Thêm</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>

                <div class="row task" style="border-bottom: none">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button type="button" class="btn bg-blue" style="background-color: #1976d2; color:white">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data"
                            style="width:95%">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input class="form-control" type="text" placeholder="Tìm kiếm" name="search">

                        </form>
                    </div>
                </div>
            </div>


            <!-- @if (session('thongbao'))
                <div class="alert alert-success">
                    {{ session('thongbao') }}<br>
                </div>
            @endif -->
            <div class="row">
                <div class="card-body col-lg-12" style="overflow-x:auto;">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style="text-align:center">
                                <th>ID</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->username}}
                                    </td>
                                    <td>
                                        {{$item->email}}
                                    </td>
                                    <td style="text-align: center">
                                        <a href="account/update/{{$item->id}}"><i class="far fa-edit"></i></a>
                                        <a href=""> <i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
{{--    phân trang--}}
    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item d-flex">
{{--                    @dump($current_page)--}}
                    @if ($current_page > 1 && $total_page > 1)
                        <a class="page-link" href="/login_fe/public/list?current_page={{$current_page-1}}&limit={{$limit}}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    @endif
                    @for ($i = 1; $i <= $total_page; $i++)
                        @if ($i == $current_page)
                            <span>{{$i}}</span>
                        @else
                            <a class="page-link" href="/login_fe/public/list?current_page={{$i}}&limit={{$limit}}">{{$i}}</a>
                        @endif
                    @endfor
                    @if ($current_page < $total_page && $total_page > 1)
                        <a class="page-link" href="/login_fe/public/list?current_page={{$current_page +1}}&limit={{$limit}}" aria-label="Previous">
{{--                            <span aria-hidden="true">&laquo;</span>--}}
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
</section>
<script>
    function check(current_page, limit){
        console.log(current_page);
        $.ajax({
            type:'get',
            url:'/login_fe/public/list?current_page='+current_page+'&limit='+limit,
            data: current_page + limit,

        }).done(function(res){
            // location.reload();location.reload();
        });
    }
</script>
@endsection
