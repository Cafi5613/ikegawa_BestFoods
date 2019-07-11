<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel BBS</title>
     <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >
    <meta name="viewport" content="width=device-width">

    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous">
     </script>
</head>

<style>
@charset "UTF-8";

body    {margin: 0;
    font-family: 'メイリオ', 'Hiragino Kaku Gothic Pro', sans-serif;
    background-color: #f0ffff;

    .main_img{width: 780px;
            text-align: center;}
    }


/* 基本 */
.page * {
    margin: 0;
}

/* グリッド */
.page {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: auto 1fr auto;
    min-height: 100vh;
}

/* ヘッダー */
.page-head {
    grid-column: 1;
    grid-row: 1;
    padding: 15px 0;
    background-color: #222;
    text-align: center;
}

.page-head a{
    text-decoration: none;
    color: #fff;
    font-size:2;
}

/* メインコンテンツ */
.page-main {
    grid-column: 1;
    grid-row: 2;
}

/* ナビゲーション */
.page-nav {
    grid-column: 1;
    grid-row: 2;
    z-index: 100;
    display: none;
}

.open .page-nav {
    display: block;
}

.page-nav ul {
    margin: 0;
    padding: 0;
    list-style: none;
}

.page-nav a {
    display: block;
    margin: 30px;
    border-bottom: solid 1px #aaa;
    color: #fff;
    font-size: 20px;
    text-decoration: none;
}


/* ボタン */
.page-btn,
.page-btn-close {
    grid-column: 1;
    grid-row: 1;
    justify-self: start;
    align-self: center;
    padding: 20px;
    border: none;
    background-color: transparent;
    color: #fff;
    font-size: 28px;
    cursor: pointer;
}

.page-btn-close {
    display: none;
}

.open .page-btn {
    display: none;
}

.open .page-btn-close {
    display: block;
}

.page-foot {
    grid-column: 1;
    grid-row: 3;
        padding: 20px 0;
        background-color: #222;
        color: #fff;
        text-align: center;
        font-size:14px;
    }

    .jumbtoron-extend{
        position: ralative;
        height: 30vh;
        min-height: 300px;
        background:url(/storage/post_images/main.jpg) no-repeat center center;
        background-size: cover;
    }

    .site-name{
        margin-bottom:40px;
        font-family: 'Playfair Display',serif;
    }

    .btn-black{
        border-radius: 0;
        background-color: #000;
        font-family: 'Aveniir',serif;
    }

@media (min-width: 1260px) {
    .page {
        grid-template-columns: 260px 1fr;
    }

    /* メインコンテンツ */
    .page-main {
        grid-column: 2;
        grid-row: 1 / -1;
    }

    /* ヘッダー */
    .page-head {
        padding: 40px 0;
    }

    .page-head img {
        width: 150px;
    }

    /* ナビゲーション */
    .page-nav {
        display: block;
        background-color: #222;
    }

    /* ボタン */
    .page-btn {
        display: none;
    }

    /* フッター */
    .page-foot {
        padding: 40px 0;
        background-color: #222;
        color: #fff;
        text-align: center;
    }

}




</style>

<body class="page">


<header class="page-head">
    <a href="#">Laravel foods</a>
</header>


<main class="page-main">
 <form action="log" method="POST"> 
    {{csrf_field()}}
    <input type="text" name="input" value="{{$input}}">
    <input type="submit" value="find">
 </form>

@if(isset($items))
@foreach($items as $item)
<h1>{{$item->title}}</h1>
@endforeach
@endif


</main>


<nav class="page-nav">
<ul>
<li><a href="#">トップ</a></li>
<li><a href="#">最新記事</a></li>
<li><a href="#">お食事シリーズ</a></li>
<li><a href="#">おでかけシリーズ</a></li>
<li><a href="#">お問い合わせ</a></li>
</ul>
</nav>

<button type="button" class="page-btn" onclick="myFunc()">
    <span class="fas fa-bars" title="メニューを開く"></span>
</button>

<button type="button" class="page-btn-close" onclick="myFunc()">
    <span class="fas fa-times" title="メニューを閉じる"></span>
</button>


<footer class="page-foot">
    <p>© ONE POINT</p>
</footer>


<script>
function myFunc() {
document.querySelector('.page').classList.toggle('open');
}
</script>
</body>
</html>