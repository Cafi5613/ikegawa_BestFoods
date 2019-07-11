<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Http\Requests\SeachRequest;
use App\Http\Requests\MapRequest;
use App\Http\Requests\UpdateRequest;
use App\Post;


class PostsController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect()->route('Home');
    }

    public function index(){
        $user=Auth::user();
        $posts = Post::where('user_id',$user->id)->orderBy('created_at', 'desc')->paginate(5);
        $items =Post::where('user_id',$user->id)->get();
        return view('foods.index', ['posts' => $posts,'items'=>$items]);
    }

    public function create(Request $request){
        $user=Auth::user();
        return view('foods.create',['user'=>$user]);
    }

     
    public function store(PostRequest $request){
        // Postモデルのインスタンスを作成する
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->store_name =$request->store_name;
        $post->address =$request->address;
        $post->lat=$post->getLat();
        $post->lng=$post->getLng();
        if($request->genre!==NULL){
            $items = implode(',',$request->genre);
            $post->genre=$items;
        };
        $post->evaluation=$request->evaluation;
        $post->holiday= $request->holiday;
        $post->phone_number=$request->phone_number;
        $post->open=$request->open;
        $post->menu=$request->menu;

        //画像アップロード
        $time = date("Ymdhis").Auth::user()->id;
        $post->image_url =$request->image_url->storeAs('public/post_images', $time.'_'.Auth::user()->id . '.jpg');
        $post->image_url =str_replace('public/', 'storage/', $post->image_url);
        //コンテンツ
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        $post->save();
        //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト        
        return redirect()->route('top');
    }

    public function show($id){
        $user=Auth::user();
        $post=Post::findOrFail($id);
        return view('foods.show',['post'=>$post,'user'=>$user]);
    }

    public function edit($id){
        $user=Auth::user();
        $post = Post::findOrFail($id);
        return view('foods.edit', ['post' => $post,'user'=>$user]);
    }
    
    public function update($id,UpdateRequest $request){
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->store_name =$request->store_name;
        $post->address =$request->address;
        $post->lat=$post->getLat();
        $post->lng=$post->getLng();
        if($request->genre!==NULL){
            $items = implode(',',$request->genre);
            $post->genre=$items;
        };
        $post->evaluation=$request->evaluation;
        $post->holiday= $request->holiday;
        $post->phone_number=$request->phone_number;
        $post->open=$request->open;
        $post->menu=$request->menu;
        //登録ユーザーからidを取得
        $post->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        $post->save();
        return redirect()->route('foods.show', ['post' => $post]);
    }
    
    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('top');
    }
    
    public function find(Request $request){
        $user=Auth::user();
        $items = Post::where('user_id',$user->id)->where('id',null)->paginate(5);
        return view('foods.seach',['input'=>'','items'=>$items]);
    }
    
    public function search(SeachRequest $request){
        $user=Auth::user();
        $text=implode(',',$request->genre);
        $items=Post::where('user_id',$user->id)->where('genre','LIKE',"%{$text}%")->paginate(5);
        $counts=Post::where('genre','LIKE',"%{$text}%");

        $params=['input'=>$request->input,'items'=>$items,'counts'=>$counts];
        return view('foods.seach',$params);
    }
                
    public function image(){
        $user=Auth::user();
        $posts = Post::where('user_id',$user->id)->orderBy('created_at', 'desc')->paginate(12);
        $items =Post::where('user_id',$user->id)->get();
        return view('foods.image', ['posts' => $posts,'items'=>$items]);
    }

    public function map(){
        $user=Auth::user();
        $posts =Post::where('user_id',$user->id)->where('id',null);
        $items =Post::where('user_id',$user->id)->where('id',null);
        $input = null;
        return view ('foods.map',['posts'=>$posts,'items'=>$items, 'input'=>$input]);
    }

    public function searchMap(MapRequest $request){
        $user=Auth::user();
        $text=$request->text;
        $text = str_replace(array(" ", "　"), "", $text);
        $posts=Post::where('user_id',$user->id)->where('address','LIKE',"%{$text}%")->orderBy('address', 'asc')->paginate(5);
        $items=Post::where('user_id',$user->id)->where('address','LIKE',"%{$text}%")->orderBy('address', 'asc')->get();
        $params=['input'=>$request->text,'posts'=>$posts,'items'=>$items];
        return view('foods.map',$params);
    }
}
