$(function(){
    // URLの取得
    //var url = location.href;
    //var filename = url.match(".+/(.+?)\.[a-z]+([\?#;].*)?$")[1];
    //alert(filename);
    // パスの取得
    //var path = location.pathname;
    //alert(path);

    var logo = jQuery('.header');

    $(window).scroll(function() {

       
       //if (filename == "index") {
        if ($('body').hasClass('top_page')) {
            if (jQuery(this).scrollTop() > 50) { //スクロールが500pxを越えたら
                logo.addClass('invert');
            } else { //スクロールが50pxを越えなければ
                logo.removeClass('invert');
            }
        }else {
            logo.addClass('inverts');
        }
    });

    jQuery(document).ready(function() {
        if ($('body').hasClass('top_page')) {
            if (jQuery(this).scrollTop() > 50) { //スクロールが500pxを越えたら
                logo.addClass('invert');
            } else { //スクロールが50pxを越えなければ
                logo.removeClass('invert');
            }
        }else {
            logo.addClass('inverts');
        }
    });


    let topBtn = $(".page_top");
    $(window).scroll(function() {
        let now = $(window).scrollTop();
        if (now > 330) {//もしスクロールトップが330px以上なら
            topBtn.stop().animate({ bottom: "0px" }, 300);//bottom30pxへ移動
        } else if (now <= 300) {
            topBtn.stop().animate({ bottom: "-50px" }, 300);//335px以下ならbottom-50pxの位置へ戻す
        }
    });
    topBtn.click(function() {
    $("body, html").animate({ scrollTop: 0 }, 0);
        return false;
    });
    
    // 変数に要素を入れる
    var open = $('.sign'),
        close = $('.modal-close'),
        container = $('.modal-container');
        content = $('.modal-content');

    //クリックしたらモーダルを表示する
    open.on('click',function(){	
        container.addClass('active');
        content.addClass('fadeUp');
        return false;
    });


    //閉じるボタンをクリックしたらモーダルを閉じる
    //close.on('click',function(){	
        //container.removeClass('active');
    //});

    //モーダルの外側をクリックしたらモーダルを閉じる
    $(document).on('click',function(e) {
        if(!$(e.target).closest('.modal-body').length) {
            container.removeClass('active');
            content.removeClass('fadeUp');
        }
    });
});

//バリデーション
document.addEventListener('DOMContentLoaded', () => {
    //.validationForm を指定した最初の form 要素を取得
    const validationForm = document.querySelector('.validationForm');
    //.validationForm を指定した form 要素が存在すれば
    if(validationForm) {
        //エラーを表示する span 要素に付与するクラス名（エラー用のクラス）
        const errorClassName = 'error';

        //required クラスを指定された要素の集まり  
        const requiredElems = document.querySelectorAll('.required');
        //email クラスを指定された要素の集まり
        const emailElems =  document.querySelectorAll('.email');
        //tel クラスを指定された要素の集まり
        const telElems =  document.querySelectorAll('.tel');
        //maxlength クラスを指定された要素の集まり
        const maxlengthElems =  document.querySelectorAll('.maxlength');
        //equal-to クラスを指定された要素の集まり
        const equalToElems = document.querySelectorAll('.equal-to'); 

        //エラーメッセージを表示する span 要素を生成して親要素に追加する関数
        //elem ：対象の要素
        //errorMessage ：表示するエラーメッセージ
        const createError = (elem, errorMessage) => {
        //span 要素を生成
        const errorSpan = document.createElement('span');
        //エラー用のクラスを追加（設定）
        errorSpan.classList.add(errorClassName);
        //aria-live 属性を設定
        errorSpan.setAttribute('aria-live', 'polite');
        //引数に指定されたエラーメッセージを設定
        errorSpan.textContent = errorMessage;
        //elem の親要素の子要素として追加
        elem.parentNode.appendChild(errorSpan);
        }

        //form 要素の submit イベントを使った送信時の処理
        validationForm.addEventListener('submit', (e) => {
            //エラーを表示する要素を全て取得して削除（初期化）
            const errorElems = validationForm.querySelectorAll('.' + errorClassName);
            errorElems.forEach( (elem) => {
                elem.remove(); 
            });
        
            //.required を指定した要素を検証
            requiredElems.forEach( (elem) => {
                //値（value プロパティ）の前後の空白文字を削除
                const elemValue = elem.value.trim(); 
                //値が空の場合はエラーを表示してフォームの送信を中止
                if(elemValue.length === 0) {
                createError(elem, '*入力は必須です');
                e.preventDefault();
                }
            });

            //.email を指定した要素を検証
            emailElems.forEach( (elem) => {
                //Email の検証に使用する正規表現パターン
                const pattern = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ui;
                //値が空でなければ
                if(elem.value !=='') {
                //test() メソッドで値を判定し、マッチしなければエラーを表示してフォームの送信を中止
                if(!pattern.test(elem.value)) {
                    createError(elem, 'メールアドレスの形式が正しくないようです。');
                    e.preventDefault();
                }
                }
            });

            //.tel を指定した要素を検証
            telElems.forEach( (elem) => {
                //電話番号の検証に使用する正規表現パターン
                const pattern = /^[0-9]+$/;
                //値が空でなければ
                if(elem.value !=='') {
                //test() メソッドで値を判定し、マッチしなければエラーを表示してフォームの送信を中止
                if(!pattern.test(elem.value)) {
                    createError(elem, '数字(0-9)で入力してください。');
                    e.preventDefault();
                }
                }
            });

            //.maxlength を指定した要素を検証
            maxlengthElems.forEach( (elem) => {
                //data-maxlength 属性から最大文字数を取得
                const maxlength = elem.dataset.maxlength;
                //または const maxlength = elem.getAttribute('data-maxlength');
                //値が空でなければ
                if(elem.value !=='') {
                //値が maxlength を超えていればエラーを表示してフォームの送信を中止
                if(elem.value.length > maxlength) {
                    createError(elem, maxlength + '文字以内で入力してください');
                    e.preventDefault();
                }
                }
            });


            //エラーの最初の要素を取得
            const errorElem =  validationForm.querySelector('.' + errorClassName);
            //エラーがあればエラーの最初の要素の位置へスクロール
            if(errorElem) {
                const errorElemOffsetTop = errorElem.offsetTop;
                window.scrollTo({
                top: errorElemOffsetTop - 150,  //150px 上に位置を調整
                //スムーススクロール
                behavior: 'smooth'
                });
            }
        }); 
    }

});

function like(postId) {
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      url: `/like/${postId}`,
      type: "POST",
    })
      .done(function (data, status, xhr) {
        console.log(data);
      })
      .fail(function (xhr, status, error) {
        console.log();
      });
  }