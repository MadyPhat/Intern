@extends('evaluator.dashboard')
@section('head')
    <h3 align="center">Create Property</h3>
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
        <form  method="post" action="{{ url('property') }}">
            {{csrf_field()}}
            <div class="form-group">
                <input type="text" class="form-control" id="inputEmail" name="property_name" placeholder="Property_name">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="inputPassword" name="type" placeholder="Type">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="price" placeholder="Price"> </input>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>


@endsection

