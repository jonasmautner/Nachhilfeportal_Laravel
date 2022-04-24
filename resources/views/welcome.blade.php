<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nachhilfeportal</title>
    </head>
    <body>
        <h1>Registrierte Benutzer:</h1>
        @foreach($users as $user)
            <h2>Vorname: {{$user->firstname}}, Nachname: {{$user->lastname}}, E-Mail: {{$user->email}}</h2>
        @endforeach
    </body>
</html>
