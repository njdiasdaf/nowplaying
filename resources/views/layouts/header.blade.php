<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Lesson Sample Site</title>
    
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
                    <li><a href="{{ url('/index') }}">ホーム</a></li>
                    <li class="last" id=""><a href="">ログアウト</a></li>
                </ul>
            </div>

        <!-- ログインメニュー 
        <div class="modal-container">
            <div class="modal-body">
                <div class="modal-content">
                    <p class="login">ログイン</p>
                    <form>
                        <div class="loginarea">
                            <p><input type="text" name="mail" placeholder="メールアドレス" class="modal-textarea"></p>
                            <p><input type="password" name="pass" placeholder="パスワード" class="modal-textarea"></p>
                            <p><input type="submit" value="送　信" class="sousinbtn"></p>
                        </div>
                        <div class="link">
                            <p><button  class="linkbtn"><img src="{{asset('img/twitter.png')}}"></button></p>
                            <p><button  class="linkbtn"><img src="{{asset('img/fb.png')}}"></button></p>
                            <p><button  class="linkbtn"><img src="{{asset('img/google.png')}}"></button></p>
                            <p><button  class="linkbtn"><img src="{{asset('img/apple.png')}}"></button></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        -->

        </div>

    </header>
   
 
