@extends('admin.dashboard')
@section('head')
    <h3 align="center">Add a Branch</h3>
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
            <form  method="post" action="{{ url('branches') }}">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" name="branch_name" placeholder="Branch_Name">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" id="inputLocation" name="branch_location" placeholder="Branch_Location">
                </div>

                <div class="form-group">
                    <select id="company" class="form-control" style="width: 200px" name="bank_id">
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
            placeholder: 'Select Banks',
            allowClear:true
        })
    </script>

@endsection

