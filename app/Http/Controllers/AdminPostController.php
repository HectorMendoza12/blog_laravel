<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Yajra\DataTables\DataTables;

class AdminPostController extends Controller
{
    // Vista principal de la tabla con Datatables
    public function index()
    {
        $posts = Post::with('author')->get();
        return view('admin.posts', compact('posts'));
    }

}
