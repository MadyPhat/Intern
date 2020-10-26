@extends('evaluator.dashboard')
@section('contents')
    <div class="col-md-12">
    <br />
    <h3>Edit Record</h3>
    <br />
    @if(count($errors) > 0)

    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{route('customer.update',$id)}}">
    {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
    <div class="form-group">
        <input type="text" name="first_name" class="form-control" value="{{$customers->first_name}}" placeholder="Enter First Name" />
    </div>
        <div class="form-group">
        <input type="text" name="last_name" class="form-control" value="{{$customers->last_name}}" placeholder="Enter Last Name" />
    </div>
        <div class="form-group">
        <input type="text" name="phone_number" class="form-control" value="{{$customers->phone_number}}" placeholder="Enter Phone Number" />
    </div>
        <div class="form-group">
    <input type="text" name="address" class="form-control" value="{{$customers->address}}" placeholder="Enter Address" />
    </div>

    <div class="form-group">
        <select id="company" class="form-control" style="width: 200px" name="province_id">
            <option></option>
            @foreach($data as $cy)
            <option value="{{ $cy->id }}">{{$cy->company_area}}</option>
            @endforeach
        </select>
    </div>

        <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Save" />
    </div>

    </form>
    </div>
    </div>
    @endsection
