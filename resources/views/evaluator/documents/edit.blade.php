@extends('evaluator.dashboard')
@section('head')
    <h3 align="center">Edit Record<h/>
        <br />
        <br />
@endsection
@section('contents')
    <div class="col-md-12">



        @if(count($errors) > 0)

            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
                @endif
                <form method="post" action="{{route('document.update',$id)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="form-group">
                        <input type="text" name="customer_name" class="form-control" value="{{$documents->customer_name}}" placeholder="Document name" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="property_price" class="form-control" value="{{$documents->property_price}}" placeholder="property_price" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" value="{{$documents->customer->address}}" placeholder="Address_Customer" />
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <select id="company" class="form-control" style="width: 200px" name="customer_id">--}}
{{--                            @foreach($customers as $cy)--}}
{{--                                <option value="{{ $cy->id }}">{{$cy->first_name}} {{ $cy->last_name }}</option>--}}
{{--                                <option value="{{ $cy->id }}">{{$cy->first_name}} {{ $cy->last_name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div>--}}


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Save" />
                    </div>

                </form>
            </div>
    </div>
@endsection

