<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\Tag;
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
        //$posts = Post::all();
        $posts = Post::with('comments')->get();//რელაციის გაკეთებისას ნაკლები queryს გაკეთება მოუწევს ამ ჩანაწერს ვიდრე Post::all().
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
        $tags = Tag::all();
        return view('posts.create', compact('tags'));
    }

    public function show($id){
        //return Post::findorfail($id)->title;
        $post = Post::findorfail($id);
        return view('posts.show', compact('post'));
    }

    public function store(/*Request*/ CreatePostRequest $request){
        //dd($request->all());

        // პირველი გზა მონაცემის ბაზაში ჩამატების
//        $post = new Post();
//        $post->title = $request->get('title');
//        $post->author_name = $request->get('author_name');
//        $post->post_text = $request->get('post_text');
//        $post->save();

        //ვალიდაცია ცალკე კლასის გარეშე
//        $request->validate([
//            'title' => 'required|min:5',
//            'author_name' => 'required',
//            'post_text' => 'required'
//        ]);
        //მეორე გზა მონაცემის ბაზაში ჩამატების
        $post = Post::create([
            'title' => $request->get('title'),
            'post_text' => $request->get('post_text'),
            'author_name' => $request->get('author_name'),
        ]);
        $post->tags()->sync($request->get('tags'));

        return redirect()->back();
    }

    public function edit($id){
        $post = Post::findorfail($id);
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));

    }

    public function update(Request $request, $id){
        $post = Post::findorfail($id);
        $post->tags()->sync($request->get('tags'));
        $post->update($request->all());
        return redirect()->back();
    }

    public function destroy($id){
        $post = Post::findorfail($id);
        $post->delete();
        return redirect()->back();
    }

}
