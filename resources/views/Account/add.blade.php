@extends('layout')
@section('content')
    <div class="container-fuild">
        <div class="container">
            <form action="{{route('post-account')}}"  method="POST" enctype="multipart/form-data">
            @csrf
                @if (isset($error))
                    <div class="alert alert-error" style="color: #b30000;">
                        {{ $error }}<br>
                    </div>
                @elseif (isset($success))
                    <div class="alert alert-error" style="color: green;">
                        {{ $success }}<br>
                    </div>
                @endif
                <div class="mb-3">
                  <label for="username" class="form-label">Tên tài khoản</label>
                  <input type="text" class="form-control" id="username" name="username">
                  <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                  <label for="mail" class="form-label">Email</label>
                  <input type="email" class="form-control" id="mail" name="email">
                </div>
                
                <button type="submit" class="btn btn-primary">Thêm</button>
              </form>
        </div>
    </div>
   
@endsection