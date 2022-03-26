@extends('layout')
@section('content')
    <div class="wrapper">
        <div class="login__bg mainWrap container-fluid"> 
            <div class="form__login container">
                <form action= "{{route('loginApi')}}"  method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form__login__card">
                        <div class="card__header">
                            <div class="row">                          
                                <div class="col-12">
                                    <span>Đăng nhập</span>
                                    <img src="https://cdn-app.kiotviet.vn/retailler/Content/kiotvietLogo.png" alt="KiotViet" title="KiotViet">
                                </div>
                            </div>
                        </div>
                        @if (isset($error))
                            <div class="alert alert-error" style="color: #b30000;">
                                {{ $error }}<br>
                            </div>
                        @endif
                        
                        <div class="card__body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="card__body__input" id="" name="username" placeholder="Tên đăng nhập" >                                      
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="card__body__input" id="" name="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="form-group d-flex align-items-center" >
                                        <input type="checkbox" class="" id="" >
                                        <span class="card__body__check">Duy trì đăng nhập</span>
                                        <div class="card__body__split">
                                            <span>|</span>                                      
                                            <a href="">Quên mật khẩu?</a>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card__footer">
                            <div class="row" >
                                <div class="col-6" style="padding: 0">
                                    <button class="card__footer__btn--blue"> <i class="fa-solid fa-chart-line" style="width: 20px;"></i> Quản lý</button>
                                </div>
                                <div class="col-6" style="padding: 0">
                                    <button type="submit" class="card__footer__btn--green"> <i class="fas fa-shopping-basket"></i> Bán hàng </button>
                                </div>
                            </div>                          
                        </div>                                           
                    </div>
                </form>
                
            </div> 
        </div>
    </div>
   
@endsection
