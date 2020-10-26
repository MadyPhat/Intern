@extends('evaluator.dashboard')
@section('contents')
    <div class="col-md-12">
        <br />
        <h3 align="center">Stuff Data</h3>

        @if($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <div align="right">
            <a href="{{ route('stuff.create')}}" class="btn btn-primary" >Add data</a>
            <br />
            <br />
        </div>
        <table class="table table-bordered table-striped" id="myTable" style="width: 100%">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Stuff_code</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Create time</td>
                    <td>Update time</td>
                    <td>Option</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($stuffs as $row)
                    <tr>
                        <td> {{$row->id}}</td>
                        <td> {{$row->stuff_code}} </td>
                        <td> {{$row->first_name}} </td>
                        <td> {{$row->last_name}} </td>
                        <td> {{$row->created_at}} </td>
                        <td> {{$row->updated_at}} </td>
                        <td>
                            <a href="{{ route('stuff.edit', $row->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('stuff.destroy',$row->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
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
