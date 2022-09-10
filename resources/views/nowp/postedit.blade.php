<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Now playing</title>
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>

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
        if( mypage("変更しますか。")) {
            frm.submit();
        } else {
            alert("キャンセルしました。");
            return false;//送信させない
        }
    }
</script>

<header>


</header>

<div class="inquiry">
    <div class="inquiry-box">
        <p class="dai">投稿変更</p>
        <form action="{{ url('/posteditcomp') }}" method="post" name="myForm" class="validationForm" novalidate>
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
                <input type="hidden" name="id" id="id" value="{{ $post->id }}">
                <div class="textarea">
                    <label for="artist_name" class="label">アーティスト名<span class="asterisk">*</span></label>
                    <input class="required maxlength" data-maxlength="20" type="text" name="artist_name" id="artist_name" value="{{ $post->artist_name }}">
                </div>
                <div class="textarea">
                    <label for="song_title" class="label">曲名<span class="asterisk">*</span></label>
                    <input class="required maxlength" data-maxlength="30" type="text" name="song_title" id="song_title" value="{{ $post->song_title }}">
                </div>
                <div class="textarea">
                    <label for="message" class="label">ひと言</label>
                    <input type="text" name="message" id="message" rows="5" value="{{ $post->message }}">
                </div>

                    <div class="btnarea">
                    <form action="url('/posteditcomp')" method="post" name="myForm" class="mybtn">
                        @csrf
                            <button name="send" class="sousinbtn" role="button"><input type="submit" value="編集"><button>
                    </form>
                    <form name="myForm" class="mybtn">
                        @csrf
                        <button class="backbtn"><input type="button" value="戻る" onClick="history.back();"><button>
                    </form>
                </div>
            </div>
        </form>
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

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/cafe.js') }}"></script>

</body>
</html>