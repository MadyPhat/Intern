@extends('evaluator.dashboard')
@section('head')
    <h3 align="center">Create Stuff</h3>
    <br>
@endsection

@section('contents')
        <div class="col-sm-12">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ url('stuff') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="stuff_code" placeholder="stuff_code"/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="first_name" placeholder="first_name"/>
                    </div>
                    <div class="form-group">
                       <input type="text" class="form-control" name="last_name" placeholder="last_name"/>
                    </div>
{{--                    <div class="form-group">--}}
{{--                       <input type="text" class="form-control" name="email" placeholder="E-mail"/>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                       <input type="text" class="form-control" name="password" placeholder="Passwords"/>--}}
{{--                    </div>--}}

                    <button type="submit" class="btn btn-primary">Add Stuff</button>
                </form>
            </div>
        </div>
    </div>
@endsection

