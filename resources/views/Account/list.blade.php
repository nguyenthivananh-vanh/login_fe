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
            <!-- <div class="header__mobile">
                <div class="row title">
                    <div class="col-lg-1 col-md-1 col-sm-1 header__mobile-navbar">
                        <label for="header__mobile-input" class="header__mobile--btn" onclick="checkbar()">
                            <i class="fas fa-bars"></i>
                        </label>
                    </div>
                    <div class="col-lg-1 col-md-1  col-sm-2 header__mobile-navbar">
                        <span class="header__home"><a href=""><i
                                    class="fas fa-home"></i></a></span>
                    </div>

                    <div class="col-lg-7 col-md-6  col-sm-4 header__mobile-empty"></div>
                    <div class="col-lg-3 col-md-4  col-sm-5 header__mobile-search">
                        <div class="search-container">
                            <form action="" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input style="border: 1px solid #ddd; border-radius: 3px;padding-left: 10px" type="text"
                                    placeholder="Search.." name="search" id="search">
                            </form>
                        </div>
                    </div>

                </div>
                <div class="row task">
                    <div class="col-lg-2 col-md-2  col-sm-3 header__mobile-5">
                        <h5 class="card-title">Users</h5>
                    </div>
                    <div class="col-lg-7 col-md-6  col-sm-4 no-empty"></div>
                    <div class="col-lg-3 col-md-4  col-sm-5  task-button header__mobile-5">
                        <button class="btn-add"><a href=""> <i
                                    class="fas fa-plus"></i>Thêm</a></button>
                    </div>
                </div>
            </div> -->

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
</section>
@endsection
