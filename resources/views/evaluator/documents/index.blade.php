@extends('evaluator.dashboard')
@section('contents')
    <div class="col-md-12">
        <br />
        <h3 align="center">Documents Data</h3>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div align="right">
            <a href="{{route('document.create')}}" class="btn btn-primary" >Add data</a>
            <br />
            <br />
        </div>
        <table id="myTable" class="table table-bordered table-striped" style="width: 100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Document Customer</th>
                <th>property_price</th>
                <th>Customer full Name</th>
                <th>Address</th>
                <th>Province-City</th>
                <th>Time</th>
                <th>option</th>
                <th></th>
            </tr>
            </thead>
{{--            {{ $documents }}--}}
            @foreach($documents as $row)
                <tr>
                    <td>{{$row->id}}</td>
{{--                    <td>{{$row->customer}}</td>--}}
                    <td>{{$row->customer_name}}</td>
                    <td>{{$row->property_price}}</td>
                    <td>{{$row->customer->full_name}}</td>
                    <td>{{$row->customer->address}}</td>
                    <td>{{$row->customer->province->company_area}}</td>
                    <td>{{$row->created_at}}</td>
                    <td> <a href="{{ route('document.edit', $row->id)}}" class="btn btn-warning">Edit</a>
                        {{--                         <a href="{{action('CustomerController@destroy', $row['id'])}}" class="btn btn-danger">Delete</a>--}}

                    </td>
                    <td>
                        <form method="post" class="delete_form" action="{{route('document.destroy',$row->id)}}">
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
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $('.delete_form').on('submit', function () {--}}
{{--                if(confirm("Are you sure want to delete it ?"))--}}
{{--                {--}}
{{--                    return true;--}}
{{--                }--}}
{{--                else--}}
{{--                {--}}
{{--                    return false;--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--        // $(document).ready(function () {--}}
{{--        //     $('#example').DataTable();--}}
{{--        // });--}}
{{--      </script>--}}

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        })
    </script>
@endsection
