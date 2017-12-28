@extends('_layouts.default')
@section('content')

    <body class="hold-transition register-page">
    <div class="register-box">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="register-box-body">
            <p class="login-box-msg">Register Student Information</p>
            <form action="{{ url('/register') }}" method="post">
            <!-- {{ Form::open(array('route' => 'register.post')) }} -->

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Student No" name="stud_no" value="{{ old('stud_no') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Course" name="course" value="{{ old('course') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="First name" name="first_name" value="{{ old('first_name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Middle name" name="middle_name" value="{{ old('middle_name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Last name" name="last_name" value="{{ old('last_name') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"/>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation"/>
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                 <div class="form-group has-feedback">
                    <input type="date" class="form-control" placeholder="Birth Date" name="birth_date" value="{{ old('birth_date') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Gender" name="gender" value="{{ old('gender') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                 <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div><!-- /.col -->
                </div>
            </form>

        </div><!-- /.form-box -->
    </div><!-- /.register-box -->
</body>

@endsection
