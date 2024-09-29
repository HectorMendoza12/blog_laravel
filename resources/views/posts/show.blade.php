<x-app2>
    @section('title', $post->title)
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="{{ asset('js/main.js') }}" defer></script>

    <style>
        .post-content {
            font-size: 1.2em;
        }
        .post-info {
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .like-button {
            border: none;
            background: none;
            cursor: pointer;
        }
        .liked img {
            filter: brightness(0) saturate(100%) invert(45%) sepia(89%) saturate(495%) hue-rotate(160deg) brightness(97%) contrast(85%);
        }
    </style>

    <body class="light">
        <div class="container mt-5">
            @if(session('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('mensaje') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1>{{ $post->title }}</h1>
            <img src="{{ $post->photo ? asset('storage').'/'.$post->photo : asset('default-image.jpg') }}" alt="Foto del post" class="card-img-top" style="height: 500px; object-fit: cover;">

            <div class="post-info">
                <p class="mb-0"><strong>Autor:</strong> {{ $post->author->rpe }}</p>
                <p class="mb-0"><strong>Fecha:</strong> {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</p>
            </div>

            <p class="post-content mt-3">{{ $post->content }}</p>
            <p>
                <strong>Likes:</strong> <span id="likes-count">{{ $post->likes_count }}</span>
            </p>
            <form id="like-form" method="POST" action="{{ route('posts.likes.store', $post->id) }}">
                @csrf
                <button type="button" id="like-button" class="like-button">
                    <img src="{{ asset('assets/like.png') }}" alt="Like" style="width: 30px; height: 30px;">
                </button>
            </form>
            <a href="{{ route('post.index') }}" class="btn btn-warning mt-3">Regresar</a>
        </div>

        <script>
            const likeButton = document.getElementById('like-button');
            const likesCount = document.getElementById('likes-count');
            let liked = false;

            likeButton.addEventListener('click', function(event) {
                event.preventDefault(); 

                fetch('{{ route('posts.likes.store', $post->id) }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ liked: !liked })
                })
                .then(response => response.json())
                .then(data => {
                    likesCount.textContent = data.likes_count;
                    liked = !liked;
                    likeButton.classList.toggle('liked', liked);
                })
                .catch(error => console.error('Error:', error));
            });
        </script>
    </body>
</x-app2>
