<!-- resources/views/benevoles/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Éditer un Bénévole</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Éditer Bénévole #{{ $benevole->id }}</h1>

        <form action="{{ route('benevoles.update', $benevole->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" class="form-control" value="{{ $benevole->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $benevole->prenom }}" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $benevole->adresse }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>

        <a href="{{ route('benevoles.index') }}" class="btn btn-secondary mt-3">Retour à la liste des bénévoles</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
