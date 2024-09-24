<!-- resources/views/benevoles/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Détails du Bénévole</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Détails du Bénévole #{{ $benevole->id }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $benevole->nom }} {{ $benevole->prenom }}</h5>
                <p class="card-text">Adresse: {{ $benevole->adresse }}</p>
                <a href="{{ route('benevoles.index') }}" class="btn btn-secondary">Retour à la liste</a>
                <a href="{{ route('benevoles.edit', $benevole->id) }}" class="btn btn-warning">Éditer</a>
                <form action="{{ route('benevoles.destroy', $benevole->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bénévole ?')">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
