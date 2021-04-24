<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Object_;

class PostController extends Controller
{
    //index ფუნქცია აბრუნებს ცხრილიდან ყველა ჩანაწერს.
    public function index(){
        //პირველი გზა
        //return Post::all();
        //მეორე გზა
        //$posts = DB::table("posts")->get();
        //return $posts;
        //return view('posts.index');
        $posts = Post::all();
        return view('posts.index', compact('posts'));
        //მონაცემების გაფილტვრა(where - ის გამოყენებით)
        //$post = post::where('author_name', '=', 'test_author')->get();
        //მონაცემების დალაგება title სვეტის მიხედვით(orderby - ის გამოყენებით)
        //$post = post::where('author_name', '=', 'test_author')->orderBy('title')->get();
        //მონაცემების დალაგება title სვეტის კლებადობის მიხედვით(orderby - ის გამოყენებით)
        //$post = post::where('author_name', '=', 'test_author')->orderBy('title', 'desc')->get();
        //წამოიღებს მონაცემებს რომლის id მეტია 10ზე და დაალაგებს title - ის მიხედვით უკუღმა
        //$post = post::where('id', '>', 10)->orderBy('title', 'desc')->get();
        //წამოიღებს ყველა ჩანაწერს პოსტ ცხრილიდან.
        //return Post::all();
        //თუ იპოვა 9 id - ის მქონე ჩანაწერი გამოიტანს თუ არადა ერორს მოგვცემს.
        //return Post::findorfail(9);
        //წამოიღებს პირველ ჩანაწერს id - სგან დამოუკიდებლად.
        //return Post::first();
        //წამოიღებს მე-9 id - ის მქონე ჩანაწერს ცხრილიდან.
        //return Post::find(9);
        //წამოიღებს მეცხრე აიდის მქონე ჩანაწერის ტექსტს.
        //return Post::find(9)->post_text;
    }

    public function postList(){
        $posts = Post::paginate(10);
        return view('posts.post-list', compact('posts'));
    }
    public function create(){
//        Post::create([
//            'title' => 'test_title',
//            'author_name' => 'test_author',
//            'post_text' => 'test_text'
//        ]);
//        return 'the new post created successfully';
        return view('posts.create');
    }

    public function show($id){
        //return Post::findorfail($id)->title;
        $post = Post::findorfail($id);
        return view('posts.show', compact('post'));
    }

    public function store(Request $request){
        //dd($request->all());

        // პირველი გზა
//        $post = new Post();
//        $post->title = $request->get('title');
//        $post->author_name = $request->get('author_name');
//        $post->post_text = $request->get('post_text');
//        $post->save();

        //მეორე გზა
        Post::create([
            'title' => $request->get('title'),
            'post_text' => $request->get('post_text'),
            'author_name' => $request->get('author_name'),
        ]);

        return redirect()->back();
    }

    public function edit($id){

        $post = Post::findorfail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id){
        $post = Post::findorfail($id);
        $post->update($request->all());
        return redirect()->back();
    }

    public function destroy($id){
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }

}
