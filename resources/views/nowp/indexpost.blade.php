<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Now Playing</title>
    
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">

<!-- 
    <link rel="stylesheet" href="css/style.css">
    <script src="{{ asset('/js/cafe.js') }}"></script>
    <script src="{{ mix('js/cafe.js') }} " defer></script>
    <script src="{{ url(mix('js/cafe.js')) }}" defer></script>
-->

</head>

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
    <div class="header">
        <div class="logo"><a href="{{ url('/index') }}"><img src="{{asset('img/logo.png')}}"></a></div>
        <div class="header-list">
            <ul class="header-list-ul">
                <li><a href="{{ url('/mypage') }}">マイページ</a></li>
                <li class="last" id=""><a href="">ログアウト</a></li>
            </ul>
        </div>
    </div>
</header>
   
<body class="all">
<div class="inquiry">
    <div class="inquiry-box">
        <p class="dai">投稿フォーム</p>
        <form action="{{ url('/index') }}" method="post" name="myForm" class="validationForm" novalidate>
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
                    <input class="required maxlength" data-maxlength="100" type="text" name="song_title" id="song_title" placeholder="曲名">
                </div>
                <div class="message">
                    <label for="message">ひと言<span class="asterisk">*</span></label>
                    <textarea name="message" id="message" rows="5"></textarea>
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