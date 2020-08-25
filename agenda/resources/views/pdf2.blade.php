<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>

<h1 style="border-bottom: 1px solid #ccc; margin-bottom: 30px;">USUÁRIOS SEM TELEFONE</h1>


    @foreach($nomes as $nome)
        @foreach($nome as $user)
            <h2>{{$user}}</h2>
        @endforeach
    @endforeach

</body>
</html>