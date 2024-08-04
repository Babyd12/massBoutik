<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'M2C Boutik')</title>
    <!-- Bootstrap CSS -->


    <!-- Font locale ou standard -->
   

    @yield('css')
</head>

<body>
    <main>
        @yield('content')
        comment eviter a mon enfant de chaumer ?
        le gars dit a part l'ecole sacher faire quelque chose de vous meme 
        mon fils ira a lecole 
        les vacances il fera quoi serveur restaurant peut etre 
        certification 3 mois dans un metier pro + 3 mois de stage 
    </main>
</body>

</html>
