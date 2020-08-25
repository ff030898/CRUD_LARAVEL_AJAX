<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
</head>
<body>

<h1 style="border-bottom: 1px solid #ccc; margin-bottom: 30px;">USUÁRIOS COM TELEFONE</h1>


    @foreach($users as $user)
    
        @foreach($contatos as $contato)

        @if($contato->user_id === $user->id)
        <h2>{{$user->name}}</h2>
        @break;
        @endif
        
        @endforeach
    @endforeach
    
</body>
</html>