<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Now playing</title>
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/cafe.js') }}"></script>
    <script src="{{ asset('/js/like.js') }}"></script>

<!-- 
    <link rel="stylesheet" href="css/style.css">
    <script src="{{ asset('/js/cafe.js') }}"></script>
    <script src="{{ mix('js/cafe.js') }} " defer></script>
    <script src="{{ url(mix('js/cafe.js')) }}" defer></script>
-->

</head>

<x-app-layout>
    <x-slot name="header">
        <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>-->
    </x-slot>

    <!--<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>-->
</x-app-layout>


<script>
    function confirm_test() {
        if( confirm("ログアウトしますか。")) {
            frm.submit();
        } else {
            alert("キャンセルしました。");
            return false;//送信させない
        }
    }
</script>

<header>
</header>
   
<body class="all">
<div class="inquiry">
    <div class="inquiry-box">
        <p class="dai">管理者ページ</p>
        <form action="{{ url('/indexpost') }}" method="post" name="myForm" class="validationForm" novalidate>
            @csrf
            <div class="inquiryarea">
                @if ($errors->any())
                <div>
                    <ul class="errorphp">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
	             @endif
                 
                <div class="textarea">
                    <label for="artist_name" class="label">アーティスト名<span class="asterisk">*</span></label>
                    <input class="required maxlength" data-maxlength="20" type="text" name="artist_name" id="artist_name" placeholder="アーティスト名">
                </div>
                <div class="textarea">
                    <label for="song_title" class="label">曲名<span class="asterisk">*</span></label>
                    <input class="required maxlength" data-maxlength="30" type="text" name="song_title" id="song_title" placeholder="曲名">
                </div>
                <div class="textarea">
                    <label for="message" class="label">ひと言</label>
                    <input type="text" name="message" id="message" rows="5">
                </div>
                <button name="send" class="sousinbtn">投稿</button>
            </div>
        </form>
    </div>
</div>

<div class="">
    <div class="inquiry-box">
        <form action="{{ url('/confirm') }}" method="post" name="myForm" class="validationForm" novalidate>
            @csrf
            <div class="inquiryarea">
                <div class="textarea">
                    <input class="" type="text" name="name" id="name" placeholder="">
                    <button name="send" class="sousinbtn">検索</button>
                </div>
            </div>
        </form>
    </div>
</div>

    <div class="post-all" >
        <div class="post-box">
        <?php foreach ($posts as $post) :?>
                <div class="post">
                    <p class="post-name">{{ $post->user_name }}</p>

                    <p class="post-aname">{{ $post->artist_name }}</p>

                    <p class="post-title">{{ $post->song_title }}</p>
                    <p class="post-mes">{{ $post->message }}</p> 
                    <p class="post-time">{{ $post->created_at }}</p>

                    @if(auth()->user())
                        @if(isset($post->like_posts[0]))
                            <a class="toggle_wish" post_id="{{ $post->id }}" like_post="1">
                                <i class="fas fa-heart"></i>
                            </a>
                        @else
                            <a class="toggle_wish" post_id="{{ $post->id }}" like_post="0">
                                <i  class="far fa-heart"></i>
                            </a> 
                        @endif
                    @endif  
                </tr>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<footer>
    <div class="footer-all">      
        <div class="copyright">
            <p>このサイトの素材は全て著作権フリーのものを使用しています。<br>
            © 2021- Nowplaying, Inc. All rights reserved.<p>
        </div>
    </div>
</footer>

</body>
</html>