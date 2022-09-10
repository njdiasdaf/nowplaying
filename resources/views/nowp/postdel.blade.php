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
        <form action="{{ url('/acedelcomp') }}" method="post" name="myForm" class="validationForm" novalidate>
            @csrf
            <div class="inquiryarea">
            <p class="dai">退会しますか</p>
                <?php foreach ($user as $data) :?>
                <div class="textarea">
                    <label for="name">アカウント名<span class="asterisk">*</span></label>
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="textarea">
                    <label for="email">メールアドレス<span class="asterisk">*</span></label>
                    <p>{{ Auth::user()->email }}</p>
                </div>
                <?php endforeach; ?>
                <div class="btnarea">
                        <button type="submit" class="sousinbtn">退会する</button>
                        <input type="button" value="戻　る" class="backbtn" onClick="history.back();">
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