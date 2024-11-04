<!DOCTYPE html>
<html>
<head>
    <title>Nova Mensagem de Contato</title>
</head>
<body>
    <h1>Você recebeu uma nova mensagem de contato</h1>
    <p><strong>Email:</strong> {{ $details['email'] }}</p>
    <p><strong>Mensagem:</strong> {{ $details['message'] }}</p>
</body>
</html>
