@extends('layout')
@section('content')
    <section class="section section-posts lighten-4 content">
        <div class="container action pt-4">
            <div class="row">
                <div class="col-4">
                    <select class="form-select" aria-label="Default select example" onchange="getLisDistrict()" id="city">
                        <option selected>Thành phố</option>
                        @if(isset($cities) && $cities != null)
                            @foreach($cities as $item)
                                <option value="{{$item->id}}">{{$item->local_city_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-4">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Quận/huyện</option>
                        @if(isset($districts) && $districts != null)
                            @foreach($districts as $item)
                                <option value="{{$item->id}}">{{$item->local_district_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-4">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Xã</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>

        </div>
    </section>

    <script>
        function ajaxSuccess(){

        }
        function getLisDistrict(){
            id = document.getElementById('city').value;
            $.ajax({
                url:  'location/district' ,
                type: "GET",
                data: {
                    id : id,
                },
                dataType: 'json',
                success:ajaxSuccess(),
                // success: function (data) {
                //     // alert(data.msg);
                //     // window.location=data.data.redirect;
                // },
                error: function (xhr, ajaxOptions, thrownError) {
                    return eval(callback(data));
                }
            });
        }

    </script>
@endsection

