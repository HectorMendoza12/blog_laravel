<x-app2>
    @section('title', 'Crear post')
    <script src="{{ asset('js/main.js') }}" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Crear un nuevo post</h1>

            <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Contenido</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                </div>

                <button type="submit" class="btn btn-primary">Crear post</button>
            </form>
        </div>
    </body>
</x-app2>
