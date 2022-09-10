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

<script>
    function confirm_test() {
        if( confirm("退会しますか。")) {
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
        <p class="dai">アカウント退会画面</p>
        <div class="inquiryarea">
            <?php foreach ($user as $data) :?>
            <div class="textareadel">
                <label for="name">アカウント名　</span></label>
                <p>　{{ Auth::user()->name }}</p>
            </div>
            <div class="textareadel">
                <label for="email">メールアドレス</span></label>
                <p>　{{ Auth::user()->email }}</p>
            </div>
            <?php endforeach; ?>
        <div>
    </div>
        <div class="btn">
            <form method="POST" action="{{ url('/acedelcomp') }}" onsubmit="return confirm_test()" name="myForm" class="mybtn">
                @csrf
                <button name="send" class="sousinbtn" role="button"><input type="submit" value="退会する"><button>
            </form>
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