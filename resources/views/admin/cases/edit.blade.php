@extends('admin.dashboard')
@section('head')
    <h3 align="center">Edit a Case</h3>
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
            <form  method="post" action="{{ route('cases.update', $case->id) }}">
                <input type="hidden" name="_method" value="PATCH">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" id="inputName" name="case_name" value="{{$case->case_name}}" placeholder="Case_Name">
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
            placeholder: 'Select Company Area',
            allowClear:true
        })
    </script>

@endsection

