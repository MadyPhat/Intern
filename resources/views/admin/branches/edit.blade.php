@extends('admin.dashboard')
@section('head')
    <h3 align="center">Edit a Bank</h3>
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
            <form  method="post" action="{{ route('branches.update', $branch->id) }}">
                <input type="hidden" name="_method" value="PATCH">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" name="branch_name" value="{{$branch->branch_name}}" placeholder="Branch_Name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" name="branch_location" value="{{$branch->branch_location}}" placeholder="Branch_Location">
                </div>

                <div class="form-group">
                <select id="company" class="form-control" style="width: 200px" name="bank_id" value="{{$branch->bank->bank_name}}">
                        <option></option>
                        @foreach($data as $cy)
                        <option value="{{ $cy->id }}">{{$cy->bank_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary">
                </div>

            </form>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $("#company").select2({
            placeholder: 'Select Bank',
            allowClear:true
        })
    </script>

@endsection

