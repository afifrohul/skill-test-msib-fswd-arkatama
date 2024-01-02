<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <div style="border: 1px solid black; padding:50px; width: 50%; margin: auto ">
        <form method="POST" action="{{url('/profile/new')}}">
            @csrf
            <label for="profile">Masukkan Data Profil:</label><br>
            <input width="300" type="text" name="profile">
            <button type="submit">Simpan</button>
        </form>
        @if (session('status'))
        <div style="padding-top: 20px ">
            <p style="color:green" >{{session('status')}}</p>
        </div>
        @endif
    </div>

    
</body>
</html>