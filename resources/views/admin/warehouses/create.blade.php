@extends('admin.dashboard')
@section('head')
    <h3 align="center">Add warehouse</h3>
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
                    </div>
                @endif
                @if(\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{\Session::get('success') }}</p>
                    </div>
                    @endif
            <form  method="post" action="{{ url('warehouses') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" name="warehouse_name" placeholder="Warehouse_Name">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>

            </form>
    </div>
    </div>
@endsection

