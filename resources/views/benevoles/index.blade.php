<!-- resources/views/benevoles/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Bénévoles</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Liste des Bénévoles</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('benevoles.create') }}" class="btn btn-primary mb-3">Créer un Bénévole</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($benevoles as $benevole)
                    <tr>
                        <td>{{ $benevole->id }}</td>
                        <td>{{ $benevole->nom }}</td>
                        <td>{{ $benevole->prenom }}</td>
                        <td>{{ $benevole->adresse }}</td>
                        <td>
                            <a href="{{ route('benevoles.show', $benevole->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('benevoles.edit', $benevole->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                            <form action="{{ route('benevoles.destroy', $benevole->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bénévole ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
