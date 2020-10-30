<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EMAIL</title>
</head>
<body>
    assunto: {!!$assunto!!} <br>
    nome: {{$nome}} <br>
    email: {{$email}} <br>
    telefone: {{$telefone}} <br>
    @if(isset($mensagem))
    <p>
        Mensagem: {!!$mensagem!!}
    </p>
    @endif
</body>
</html>