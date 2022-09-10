<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Now playing</title>
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>

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

<header>
</header>

<div class="inquiry">
    <div class="inquiry-box">
        <p class="dai">アカウント情報変更</p>
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
                    <p class="dai">変更しました。</p>
                </div>
                <div class="btn">
                    <a href="{{ url('/mypage') }}"><button name="send" class="sousinbtn">マイページへ戻る</button></a>
                </div>
        </div>
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