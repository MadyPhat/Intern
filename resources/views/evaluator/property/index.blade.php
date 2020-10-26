@extends('evaluator.dashboard')
@section('contents')
    <div class="col-md-12">
        <br />
        <h3 align="center">Property Data</h3>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div align="right">
            <a href="{{route('property.create')}}" class="btn btn-primary" >Add data</a>
            <br />
            <br />
        </div>
        <table id="myTable" class="table table-bordered table-striped" style="width: 100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Property Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Time Created</th>
                <th>option</th>
                <th></th>
            </tr>
            </thead>
            {{--            {{ $documents }}--}}
            @foreach($properties as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    {{--                    <td>{{$row->customer}}</td>--}}
                    <td>{{$row->property_name}}</td>
                    <td>{{$row->type}}</td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->created_at}}</td>
                    <td> <a href="{{ route('property.edit', $row->id)}}" class="btn btn-warning">Edit</a></td>
                    <td>
                        <form class="delete_form" action="{{ route('property.destroy', $row->id)}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"> Delete</button>
                        </form>
                    </td>
                </tr>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        })
    </script>
@endsection
