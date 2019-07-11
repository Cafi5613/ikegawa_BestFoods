<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Best Foods</title>

    <!-- 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
</head>
<style>

@charset "utf-8";

    
body{
    margin: 0;
    background-image: url("/storage/post_images/main.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
    font-family: 'Bitter', serif;
    color: #fff;
    }

p,h1,h2,h3,h4,h5,h6 {
  margin-top: 0;
}

img {
  vertical-align:bottom;
}

ul {
  margin: 0;
  padding: 0;
}

a {
  color: #3583aa;
  text-decoration: none;
}

a:visited {
  color: #788d98;
}

a:hover {
  text-decoration: underline;
}


h1 {
  color: #ffffff;
  font-family: 'Bitter', serif;
  font-size:7vw;
}

.content {
    padding-top: 80px;
}

p {
  font-size: 1vw;
  color: #ffffff;
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
    margin-top:20px;
    width: 90%;
  margin-left: 5%;
}
nav {
}

.global-nav {
  float: right;
  margin-top: 10px;
}

.global-nav li {
  float: left;
  margin: 0 10px;
  list-style: none;
  font-family: 'Bitter', serif;
}

.global-nav li a {
  color: #fff;
  font-size:1em;
}

.global-nav li a:hover {
  border-bottom: 2px solid #ffffff;
  padding-bottom: 3px;
  text-decoration: none;
}



/* メインコンテンツ */
.page-main {
    grid-column: 1;
    grid-row: 2;
}

#wrap {
  clear: both;
  width: 90%;
  margin-left: 5%;
  color: #fff;

}


/* ナビゲーション */

.page-foot {
    grid-column: 1;
    grid-row: 3;
        color: #fff;
        text-align: center;
        font-size:14px;
    }
footer {
  text-align: center;
  color: #ffffff;
  padding: 20px 0;
}

footer small {
  font-size: 12px;
}


.btn a {
  background-color: #009cd3;
  color: #ffffff;
  font-family: 'Bitter', serif;
  width:100px;
  display: block;
  text-align: center;
  line-height:30px;
  margin-top: 20px;
  border: 3px solid #009cd3;
  font-size:1.5vw;
}

.btn a:hover {
  text-decoration: none;
  background-color: #ffffff;
  color: #009cd3;
}

footer {
  margin: 150px auto 0 auto;
  text-align: left;
}

/* 横が狭い画面時 */
@media (max-width: 850px) {

    .content {
    padding-top: 200px;
}
}

@media (max-width: 500px) {
}


</style>

<body class="page">
<header class="page-head">   
    <a style="color: #fff; font-size:1.5em; font-weight: bold; margin-left: 20px;" class="title" href="#">-Best foods-</a>
      <ul class="global-nav">
        <li><a href="{{route('login')}}">Login</a></li>
        <li><a href="{{route('register')}}">Register</a></li>
      </ul>
</header>


<main class="page-main">
    <div id="wrap">
    <div class="content">
      <h1>Life is full of 
      delicious memories！</h1>
      <p>このWebサイトは、美味しかったを思い出にするサイトです。<br>
        たくさんの美味しいを集めて、自分だけのグルメサイトを作っていきましょう。
      <p class="btn"><a href="{{route('login')}}">Login</a></p>
    </div>
  </div>
</main>



<footer class="page-foot">
   <small>(C)2017 Hattori-studio.</small>
</footer>


</body>
</html>
