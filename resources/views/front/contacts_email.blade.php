<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nouvelle soumission de formulaire de contact de La Fiesta</title>
</head>
<body>
    <h2>Nouvelle soumission de formulaire de contact</h2>

    <p><strong>Nom :</strong> {{ $name }}</p>

    <p><strong>E-mail :</strong> {{ $email }}</p>

    <p><strong>Téléphone :</strong> {{ $phone }}</p>

    <p><strong>Message :</strong></p>

    <p>{{ (String)$from_message }}</p>
</body>
</html>
