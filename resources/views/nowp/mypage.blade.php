<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Now playing</title>
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('/js/like.js') }}"></script>

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
        if( confirm("削除しますか。")) {
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
        <p class="dai">マイページ</p>
        <div class="inquiryareamyp">
            <div class="mypbtn">
                <form action="{{ url('/acedit') }}" method="post" name="myForm" class="mybtn">
                @csrf  
                    <button name="send" class="button-40" role="button"><input type="submit" value="編集"><button>
                </form>
                <form action="{{ url('/likelist') }}" method="post" name="myForm" class="mybtn">
                @csrf
                    <button name="send" class="button-40" role="button"><input type="submit" value="いいね一覧"><button>
                </form>
                <form action="{{ url('/acedel') }}" method="post" name="myForm" class="mybtn">
                @csrf
                    <button name="send" class="button-40" role="button"><input type="submit" value="退会"><button>
                </form>
            </div>
        </div>
    </div>
</div>

    <div class="post-all" >
        <div class="post-box">
        <?php foreach ($posts as $data) :?>
                <div class="post">
                    <div class="post-flex">
                        <p class="post-name">{{ $data->user_name }}</p>
                        <p class="post-time">{{ $data->created_at }}</p>
                    </div>
                    <div class="post-flex2">
                        <p class="post-aname">{{ $data->artist_name }}　/</p>                    
                        <p class="post-title">　{{ $data->song_title }}</p>
                    </div>
                    <div class="post-flex">
                        <p class="post-mes">{{ $data->message }}</p> 
                    </div>

                    <div class="post-flex3">
                        <td>
                            <form action="{{ route('postedit', ['id'=>$data->id]) }}" method="post" name="myForm">
                            @csrf  
                            <button class="button-2" role="button"><input type="submit" value="編集"><button>　
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('postdel', ['id'=>$data->id]) }}" onsubmit="return confirm_test()">
                            @csrf
                            <button class="button-2" role="button"><input type="submit" value="削除"><button>
                            </form>
                        </td>
                    </div>
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


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/cafe.js') }}"></script>

</body>
</html>