@extends('evaluator.dashboard')
@section('head')
    <h3 align="center">Create Documents</h3>
    <br>
@endsection

@section('contents')


    <div class="col-sm-12">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success') }}</p>
            </div>
        @endif
        <form  method="post" action="{{ url('document') }}">
            {{--                <form>--}}
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" class="form-control" id="inputEmail" name="customer_name" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputPassword" name="property_price" placeholder="Property_price">
            </div>

            <div class="form-group">
                <select id="company" class="form-control" style="width: 200px" name="customer_id">
                    <option></option>
                    @foreach($customers as $cy)
                        <option value="{{ $cy->id }}"> {{$cy->first_name}} {{ $cy->last_name }}</option>
{{--                        <option value="{{ $cy->id }}">{{$cy->first_name}} {{ $cy->last_name }}</option>--}}
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
{{--        <div class="form-group row">--}}
{{--            <input type="text" name="lot_num" class="form-control col-sm-6">--}}
{{--            <div class="col-sm-6">--}}
{{--                <button class="btn btn-md btn-primary" id="save_num"> Save </button>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>


@endsection
@section('scripts')
    <script>
        $("#company").select2({
            placeholder: 'Select Customer Name',
            allowClear:true
        })
    </script>

@endsection
{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $('#save_num').on('click', function(){--}}
{{--            var lot = $('input[name=lot_num]').val();--}}
{{--            if($.isNumeric(lot)) {--}}
{{--                $.ajax({--}}
{{--                    url: "{{route('lot.create')}}",--}}
{{--                    method: 'POST',--}}
{{--                    datatype: JSON,--}}
{{--                    data: {--}}
{{--                        lot: lot,--}}
{{--                        _token: '{{csrf_token()}}'--}}
{{--                    }--}}
{{--                }).done(function(response) {--}}
{{--                    console.log(response)--}}
{{--                });--}}

{{--            } else {--}}

{{--                alert('this is not a number')--}}
{{--            }--}}
{{--        })--}}
{{--    </script>--}}
{{--@endsection--}}



