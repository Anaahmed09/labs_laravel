<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class PostController extends Controller
{
  function index()
  {
    $posts = Post::paginate();
    return view('post.index', compact('posts'));
  }
  function show($id)
  {
    $post = Post::find($id);
    return view('post.show', compact('post'));
  }
  function edit($id)
  {
    $post = Post::find($id);
    return view('post.edit', compact('post'));
  }
  public function update(Request $request, $id)
  {
    $request->validate([
      "title" => 'required|string',
      "description" => 'required|min:5',
    ]);
    Post::where('id', $id)->update($request->except('_token', '_method'));
    return redirect()->route('Post.index');
  }

  public function destroy($id)
  {
    Post::where('id', $id)->delete();
    return redirect()->route('Post.index');
  }

  public function create()
  {
    return view('post.create');
  }
  public function store(Request $request)
  {
    $request->validate([
      "title" => 'required|string',
      "description" => 'required|min:5',
    ]);
    $request['user_id'] = Auth::id();
    Post::insert($request->except('_token'));
    return redirect()->route('Post.index');
  }

  public function callBack()
  {
    $user = Socialite::driver('facebook')->user();
    // $id = intval(($user->id) / 100000000000000);
    $us = User::updateOrCreate([
      'email' => $user->email,
    ], [
        'name' => $user->name,
        'email' => $user->email,
        'password' => bcrypt($user->id),
      ]);
    Auth::login($us);
    return redirect('/dashboard');
  }
}
