<x-app2>
    @section('title', 'Blog')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <body>
        <div class="container mt-5">
            <h1 class="mb-4">Lista de posts</h1>
            <!-- Filtros -->
            <form id="filter-form" class="mb-4" method="GET" action="{{ route('post.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <select name="author_id" class="form-select">
                            <option value="">Selecciona un autor (Por default es todos)</option>
                            @foreach($authors as $author)
                                <option value="{{ $author->id }}" 
                                    @selected(request('author_id') == $author->id)>
                                    {{ $author->rpe }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="order" class="form-select">
                            <option value="desc" @selected(request('order') == 'desc')>Más recientes</option>
                            <option value="asc" @selected(request('order') == 'asc')>Más antiguos</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>

            <div class="row" id="posts-container">
                @foreach ($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ $post->photo ? asset('storage').'/'.$post->photo : asset('default-image.jpg') }}" alt="Foto del post" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="text-muted">Autor: {{ $post->author->rpe }}</p>
                            <p class="text-muted"><small>Publicado el: {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</small></p>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-info">Ver post</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div id="loading" class="text-center" style="display: none;">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>

            <div class="text-center mt-3">
                <button id="load-more" class="btn btn-primary">Cargar más</button>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            const postsUrl = "{{ route('post.index') }}"; 
            let currentPage = 1; 
            
            document.getElementById('load-more').addEventListener('click', function() {
    const loadingIndicator = document.getElementById('loading');
    loadingIndicator.style.display = 'block'; // Mostrar indicador de carga

    // Capturar los valores de los filtros
    const authorId = $('select[name="author_id"]').val();
    const order = $('select[name="order"]').val();

    currentPage++;
    let url = postsUrl + '?page=' + currentPage;
    
    if(authorId == '' && order == 'desc') {
        url = postsUrl + '?page=' + currentPage;
    }
    else {
        url += '&author_id=' + authorId + '&order=' + order;
    }

    // Hacer la solicitud AJAX
    $.ajax({
        url: url,
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            const postsContainer = $('#posts-container');

            // Verifica si hay posts
            if (data.posts.data.length === 0) {
                alert('No hay más posts para cargar.');
                loadingIndicator.style.display = 'none';
                return;
            }

            // Agregar los nuevos posts al contenedor
            data.posts.data.forEach(post => {
                const postHTML = `
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="${post.photo ? '/storage/' + post.photo : '/default-image.jpg'}" alt="Foto del post" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">${post.title}</h5>
                                <p class="text-muted">Autor: ${post.author.rpe}</p>
                                <p class="text-muted"><small>Publicado el: ${new Date(post.created_at).toLocaleString()}</small></p>
                                <a href="/post/${post.id}" class="btn btn-info">Ver post</a>
                            </div>
                        </div>
                    </div>
                `;
                postsContainer.append(postHTML);
            });
            loadingIndicator.style.display = 'none'; // Ocultar indicador de carga
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            loadingIndicator.style.display = 'none'; // Ocultar indicador de carga en caso de error
        }
    });
});

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</x-app2>


