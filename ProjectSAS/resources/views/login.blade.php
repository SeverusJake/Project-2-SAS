<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-form">
        <h1>sign in</h1>
        <form action="" class="form" method="POST">
            @csrf
            <div class="input-box">
                <i class="fa fa-id-card" aria-hidden="true"></i> <input type="text" placeholder="Username" name="txtname" required>
            </div>
            <div class="input-box">
                <i class="fa fa-braille" aria-hidden="true"></i> <input type="password" placeholder="Password" name="txtpassword" required>
            </div>
            <div class="input-box">
                <i class="fa fa-spinner" aria-hidden="true"></i><input type="submit" class="btn" value="Sign in">
            </div>

        </form>
        <div class="row">
            <div class="col">
                @isset($message)
                <script>
                    alert("{{ $message }}");

                </script>
                @endif
            </div>
        </div>
    </div>
</body>
</html>
