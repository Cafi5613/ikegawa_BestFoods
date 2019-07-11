<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel BBS</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    
    <meta name="viewport" content="width=device-width">
 
     <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous">
     </script>
</head>

<style>
@charset "UTF-8";

body{
        margin: 0;
         font-family: 'Bitter', serif;
    }
    
/* 基本 */
.page * {
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
    background-image: url('/storage/post_images/main.jpg');
    background-size: cover;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    height: 200px;
}

.page-head a{
    text-decoration: none;
    color: #fff;
    font-size:30px;
    margin-left: 10vh;
}

.page-head a:hover{
opacity: 0.8;

}

/* メインコンテンツ */
.page-main {
    grid-column: 1;
    grid-row: 2;
    margin:0 20vh 0 20vh;
}

/* ナビゲーション */
.page-nav {
    grid-column: 1;
    grid-row: 2;
    z-index: 999;
    background-color: rgba(0,0,0,0.8);
    display: none;
    margin-top: -120px;
}

/*クリック後のナビ */
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
    opacity: 0.6;
}

.page-nav a:hover{
    opacity: 1.0;
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
    margin-right: 20px;
}


.page-btn-close {
    display: none;
}
.page-btn-close:hover{
    opacity: 0.8;
}

.open .page-btn {
    display: none;
}
.page-btn:hover{
    opacity: 0.8;
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
.header_title{
    margin-top: 2vh;
    width: 100%;
}

.title{
    padding:2vh 0 0 0;
    margin-top: 4vh;
    font-size:3vw;
    font-weight: bold;
    border-bottom: solid 1px black;
    padding-bottom: 0;
    }


.title span{
    color: #7fffd4 ;
    font-size:3vh;
}
.comment{
    color: #8A0868;
    font-size:1.5vw;
    margin :5px;
}

.header_list{
    float: right;
    margin: -10px;
}

.sub_title{
    border-left: 4px solid red;
    margin-top:30px;
    font-size:3vw;
    margin-bottom: 50px;
}

    
/* 横が広い画面時 */


/* 横が狭い画面時 */
@media (max-width: 850px) {
    .page-main {
    grid-column: 1;
    grid-row: 2;
    margin:0 10vh 0 10vh;
}
}

@media (max-width: 500px) {
    .page-main {
    margin:0 2vh 0 2vh;
}

.page-head a{
    margin-left: 0;
}
}

   @yield('style')



</style>

<body class="page">


<header class="page-head">
    <div class="header_title">
        <a href="/">-Best foods-</a>
        <div class="header_list">
            <button type="button" class="page-btn" onclick="myFunc()">
                <span class="fas fa-bars" title="メニューを開く"></span>
            </button>
            <button type="button" class="page-btn-close" onclick="myFunc()">
                <span class="fas fa-times" title="メニューを閉じる"></span>
            </button>
        </div>
    </div>
</header>


<main class="page-main">

    <div class="title"></span>&nbsp;&nbsp;@yield('pan')</div>
    <div class="comment">@yield('comment')</div>   
    <div style="margin-bottom: 60px;">@yield('sub') </div>
    <div class="sub_title">&nbsp;&nbsp;@yield('sub_title')</div>
       @yield('content')
</main>


<nav class="page-nav">
    <ul>
        <li><a href="{{url('')}}">Top</a></li>
        <li><a href="{{ (route('foods.create')) }}">Post</a></li>
        <li><a href="{{url('Map')}}">Map</a></li>
        <li><a href="{{url('seach')}}">Seach</a></li>
        <li><a href="{{url('image')}}">Photo</a></li>
        <li>@if(Auth::check())
                    <a href="/logout"> Logout</a>
               @endif</li>
    </ul>
</nav>

<footer class="page-foot">
    <p>© IKEGAEWA</p>
</footer>


<script>
function myFunc() {
document.querySelector('.page').classList.toggle('open');
}
</script>
</body>
</html>

