@extends('admin.dashboard')

@section('contents')

    <div class="col-md-12">
        <br/>
        <h3 align="center">Case Data</h3>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div align="right">
            <a href="{{route('cases.create')}}" class="btn btn-primary">Add a Case</a>
            <br/>
            <br/>
        </div>
        <table class="table table-hover table-striped" id="myTable">
            <thead>
            <tr>
                <th>#</th>
                <th>Case Name</th>
                <th>option</th>
                <th>

                </th>
            </tr>
            </thead>

            @foreach($case as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row['case_name']}}</td>
                    <td><a href="{{action('BoxController@edit', $row['id'])}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form method="post" class="delete_form"
                              action="{{action('BoxController@destroy',$row['id'])}}">
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        })
    </script>
@endsection

@endsection
