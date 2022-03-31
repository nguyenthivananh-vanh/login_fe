@extends('layout')
@section('content')
    <section class="section section-posts lighten-4 content group-location">
        <div class="container action pt-4">
            <div class="row">
                <div class="col-4">
                    <select class="form-select select2 city" aria-label="Default select example" id="city" name = "city">
                        <option selected>Thành phố</option>
                        @if(isset($cities) && $cities != null)
                            @foreach($cities as $item)
                                <option value="{{$item->id}}">{{$item->local_city_name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="col-4">
                    <select class="form-select district" aria-label="Default select example" id="district" name="district">
                    </select>
                </div>

                <div class="col-4">
                    <select class="form-select ward" aria-label="Default select example" id="ward" name="ward">
                    </select>
                </div>
            </div>

        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    let districtList = {};
    let wardList = {};

    $('select[name="city"]').change(function (e) {
        let cityId = $(this).val();
        if(!districtList[cityId]){
            $.ajax({
                type:'get',
                url:'/login_fe/public/location/district?id='+cityId,
                data: cityId,
            }).done(function(res){
                districtList[cityId] = res;
                f_district(districtList[cityId]);
            });
        }else{
            f_district(districtList[cityId]);
        }
    })

    $('select[name="district"]').change(function (e) {
        let districtId = $(this).val();
        let cityId =document.getElementById('city').value;
        if(!wardList[districtId]){
            $.ajax({
                type:'get',
                url:'/login_fe/public/location/ward?city_id='+cityId+'&district_id='+districtId,
                data: cityId + districtId,

            }).done(function(res){
                wardList[districtId] = res;
                f_ward(wardList[districtId]);
            });
        }else{
            f_ward(wardList[districtId]);
        }
    })

    function f_district(districts){
        if(districts.length !== 0){
            $('select[name="district"]').html(`
                <option selected disabled>Quận/huyện</option>
                ${districts.map(district => {
                    return `<option value="${district.id}"> ${district.local_district_name}</option> `
                }).reduce((a,b) => a+b)}`)
            $('select[name="ward"]').html(`
                <option selected disabled>Xã/ Phường</option>`)

        }else{
            $('select[name="district"]').html(`
                <option selected disabled>Quận/huyện</option>`)
        }
    }

    function f_ward(wards){
        if(wards.length !== 0){
            $('select[name="ward"]').html(`
                <option selected disabled>Xã/ Phường</option>
                ${wards.map(ward => {
                return `<option value="${ward.id}"> ${ward.local_ward_name}</option> `
            }).reduce((a,b) => a+b)}`)
        }else{
            $('select[name="ward"]').html(`
                <option selected disabled>Xã/ Phường</option>`)
        }
    }

    </script>
@endsection

