<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
         $query = Post::with('author');
     
         // Aplica filtros si están presentes
         if ($request->filled('author_id')) {
             $query->where('author_id', $request->author_id);
         }
     
         if ($request->has('order') && $request->order == 'asc') {
            $query->orderBy('created_at', 'asc');
        } else {
            // Por defecto, se muestran en orden descendente
            $query->orderBy('created_at', 'desc');
        }
     
         // Obtener el número de página desde la petición
         $authors = User::has('publicaciones')->get();
         $currentPage = $request->get('page', 1);
     
         // Paginar resultados, asegurarse de que paginate maneje el número de página
         $posts = $query->paginate(6, ['*'], 'page', $currentPage);
     
         if ($request->ajax()) {
             return response()->json([
                 'posts' => $posts,
             ]);
         }
     
         return view('posts.index', compact('posts', 'authors'));
     }
     
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = new Post($request->only(['title', 'content']));

        $post->author_id = auth()->user()->id;

        if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('posts', 'public');
        $post->photo = $path;
        }

        $post->save();

        return redirect()->route('post.show', $post->id)->with('mensaje', 'Post agregado con éxito');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('posts.edit', compact('post'));
    }

    public function like($postId)
    {
        $post = Post::findOrFail($postId);

        $liked = request()->input('liked');

        if ($liked) {
            $post->increment('likes_count');
        } else {
            $post->decrement('likes_count');
        }

        return response()->json([
            'likes_count' => $post->likes_count,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $datosPost = $request->except(['_token', '_method']);

        if ($request->hasFile('photo')) {
            if ($post->photo) {
                Storage::delete('public/' . $post->photo);
            }

            $path = $request->file('photo')->store('posts', 'public');
            $datosPost['photo'] = $path;
        }
        $post->update($datosPost);

        return redirect()->route('post.show', $post->id)->with('mensaje', 'Post editado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Storage::delete('public/' . $post->photo);
        $post->delete();
        return redirect('/admin/posts')->with('mensaje', 'Post eliminado');
    }
}
