<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class NowpController extends Controller
{
    
    public function __construct(private Request $request)
    {
    }

    public function index(Request $request) {
        
        
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

            //$posts = DB::table('posts')  // 主となるテーブル名
            //->select('posts.id', 'users.name as user_name', 'posts.artist_name', 'posts.song_title', 'posts.message', 'posts.created_at')
            //->join('users', 'posts.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            //->where('posts.del_flg',  '=', '0')
            //->orderBy('created_at', 'desc')
            //->get();

            //return view('nowp.index', compact('posts'));

  
            $posts = DB::table('posts')  // 主となるテーブル名
            ->select('posts.id', 'users.name as user_name', 'posts.artist_name', 'posts.song_title', 'posts.message', 'posts.created_at')
            ->join('users', 'posts.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->where('posts.del_flg',  '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();

            return view('nowp.index', compact('posts'));

    }

    public function indexadmin(Request $request) {
        
        
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();


            //$posts = Post::orderBy('created_at', 'desc')->get();
            $posts = DB::table('posts')  // 主となるテーブル名
            ->select('posts.id', 'users.name as user_name', 'posts.artist_name', 'posts.song_title', 'posts.message', 'posts.created_at')
            ->join('users', 'posts.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->where('posts.del_flg',  '=', '0')
            ->orderBy('created_at', 'desc')
            ->get();

            return view('nowp.indexadmin', compact('posts'));
    }
    
    

    public function search(Request $request) {

        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $user_id = Auth::id();
        
        $keyword = $request->input('keyword');
        $query = DB::table('posts');

        if(!empty($keyword)) {
            $query
            ->select('posts.id', 'users.name as user_name', 'posts.artist_name', 'posts.song_title', 'posts.message', 'posts.created_at')
            ->join('users', 'posts.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
            ->where('posts.del_flg',  '=', '0')
            ->where('artist_name', 'LIKE', "%{$keyword}%")
            ->orWhere('song_title', 'LIKE', "%{$keyword}%")
            ->orderBy('created_at', 'desc')
            ->get();
        }

        $posts = $query->get();

        return view('nowp.index', compact('posts', 'keyword'));
        //return view('nowp.index', compact('user'), compact('posts'));
    }

    public function indexpost(Request $request) {

        $post = new Post();

                
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $user_id = Auth::id();

        $artist_name = request('artist_name');
        $song_title = request('song_title');
        $message = request('message');

         // データベースに値をinsert
        $post->create([
            'user_id' => $user_id,
            'artist_name' => $artist_name,
            'song_title' => $song_title,
            'message' => $message,

        ]);

        //return view('nowp.index');
        $posts = DB::table('posts')  // 主となるテーブル名
        ->select('posts.id', 'users.name as user_name', 'posts.artist_name', 'posts.song_title', 'posts.message', 'posts.created_at')
        ->join('users', 'posts.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        ->where('posts.del_flg',  '=', '0')
        ->orderBy('created_at', 'desc')
        ->get();

        return redirect('/index');
        //return view('nowp.index', compact('user'), compact('posts'));
    }


    public function mypage(Request $request) {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        //$posts = Post::orderBy('created_at', 'desc')->get();
        $posts = DB::table('posts')  // 主となるテーブル名
        ->select('posts.id', 'users.name as user_name', 'posts.artist_name', 'posts.song_title', 'posts.message', 'posts.created_at')
        ->join('users', 'posts.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        ->where('posts.user_id', '=', $id)
        ->where('posts.del_flg',  '=', '0')    
        ->orderBy('created_at', 'desc')
        ->get();



        return view('nowp.mypage', compact('posts'));
    }

    
    
    public function acedit(Request $request) {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        //$posts = Post::orderBy('created_at', 'desc')->get();
        $user = DB::table('users')  // 主となるテーブル名
        ->select('users.name', 'users.email', )
        ->where('users.id', '=', $id)       
        ->get();


        return view('nowp.acedit', compact('user'));
    }
    

    public function aceditcomp(Request $request) {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        $user = DB::table('users')
        ->where('users.id', '=', $id)
        ->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return view('nowp.aceditcomp');
    }

    public function acedel(Request $request) {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        //$posts = Post::orderBy('created_at', 'desc')->get();
        $user = DB::table('users')  // 主となるテーブル名
        ->select('users.name', 'users.email', )
        ->where('users.id', '=', $id)       
        ->get();


        return view('nowp.acedel', compact('user'));
    }

    public function acedelcomp(Request $request) {
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        $user = DB::table('users')
        ->where('users.id', '=', $id)
        ->delete();

        return redirect('/login');
    }

    public function postedit(Request $request) {
        $post = Post::find($request->id);

        return view('nowp.postedit', [
            'post' => $post,
        ]);
    }

    public function posteditadm(Request $request) {
        $post = Post::find($request->id);

        return view('nowp.posteditadm', [
            'post' => $post,
        ]);
    }


    public function posteditcomp(Request $request){
        $post = Post::find($request->id);

        $post->update([
            'artist_name' => $request->input('artist_name'),
            'song_title' => $request->input('song_title'),
            'message' => $request->input('message'),
        ]);

        return redirect('/mypage');
    }

    public function posteditcompadm(Request $request){
        $post = Post::find($request->id);

        $post->update([
            'artist_name' => $request->input('artist_name'),
            'song_title' => $request->input('song_title'),
            'message' => $request->input('message'),
        ]);

        return redirect('/indexadmin');
    }


    public function postdel(Request $request){
        $post = Post::find($request->id);

        $post->del_flg = 1;

        $post->save();

        return redirect('/mypage');
    }



    public function postdeladm(Request $request){
        $post = Post::find($request->id);

        $post->del_flg = 1;

        $post->save();

        return redirect('/indexadmin');
    }

    public function like_post(Request $request){
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        if ( $request->input('like_post') == 0) {
             //ステータスが0のときはデータベースに情報を保存
            Like::create([
                 'post_id' => $request->input('post_id'),
                  'user_id' => $id,
             ]);
            //ステータスが1のときはデータベースに情報を削除
         } elseif ( $request->input('like_post')  == 1 ) {
            Like::where('post_id', "=", $request->input('post_id'))
                ->where('user_id', "=", $id)
                ->delete();
        }
         return  $request->input('like_post');
    } 

    public function likelist(Request $request){
        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();

        //$posts = Post::orderBy('created_at', 'desc')->get();
        $posts = DB::table('posts')  // 主となるテーブル名
        ->select('posts.id', 'users.name as user_name', 'posts.artist_name', 'posts.song_title', 'posts.message', 'posts.created_at')
        ->join('users', 'posts.user_id', '=', 'users.id')  // 第一引数に結合するテーブル名、第二引数に主テーブルの結合キー、第四引数に結合するテーブルの結合キーを記述
        ->join('likes', 'posts.id', '=', 'likes.post_id')
        ->where('likes.user_id', '=', $id)
        ->where('posts.del_flg',  '=', '0')
        ->orderBy('created_at', 'desc')
        ->get();


        return view('nowp.likelist', compact('posts'));
    }




}

