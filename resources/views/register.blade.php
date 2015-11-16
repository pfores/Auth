<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">REGISTER</div>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('register.postRegister') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">User name:</label>
                <input type="text" class="form-control" id="name" name="name"
                       value="{{ old ('name') }}"
                       placeholder="El teu nom aquí"
                       required>
            </div>
            <div class="form-group">
                <label for="email">Email adress:</label>
                <input type="email" class="form-control" id="email" name="email"
                       value="{{ old ('email') }}"
                       placeholder="email@example.com"
                       required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirm">Password confirm:</label>
                <input type="password" class="form-control" id="password_confirm" name="password_confirmation" required>
            </div>

            <button id="register" type="submit" class="btn btn-default">Register</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </form>

        Ja tens usuari?
        <a id="register" href="{{ route('auth.register') }}">Loga't</a>
    </div>
</div>
</body>
</html>