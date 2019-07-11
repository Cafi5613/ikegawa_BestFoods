<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel BBS</title>
   
    <meta name="viewport" content="width=device-width">

    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous">
     </script>
</head>

<style>
@charset "UTF-8";

body	{margin: 0;
	font-family: 'メイリオ', 'Hiragino Kaku Gothic Pro', sans-serif}


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
	background-color: #ffe4b5;
	margin-bottom: -25px;
	position: relative;
}

/* ナビゲーション */
.page-nav {
	grid-column: 1;
	grid-row: 2;
	z-index: 100;
	background-color: rgba(0,0,0,0.8);
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
		z-index: 999;
	}

	.page-main >.text{
		position: absolute;
		font-weight:bold;
		top: 50%;
		left: 50%;
		font-family:serif,Quicksand,sans-serif;
		-ms-transform:translate(-50%,-50%);
		-webkit-transform:translate(-50%,-50%);
		transform: translate(-50%, -50%);
		margin: 0;
		padding: 5px 10px;
		line-height: 1;
		color: rgba(255,255, 255, 0.9);
		text-align: center;
		width: 100%;
	}

	.page-main >.text>p{
		margin: 1vh 1vh;
		font-size: 2vw;
	}

	.pagemain >.text>h1{
		font-size: 3.5vw;
	}

	.page-main>.text>.login{
		margin-top:  5vh;
		font-size:2vw;
	}

	.page-main>.text>.login>button{		
		border-radius: 10px;
		font-size:1.5vw;
		background-color:rgba(255,255, 255, 0.7);
	}




</style>

<body class="page">


<header class="page-head">
	<a href="#">Laravel foods</a>
</header>


<main class="page-main">	
		<img src="/storage/post_images/main.jpg"  height="100%" width="100%">
		<div class="text">
			<p>美味しいを思い出に..</p>
			<h1>Best Foods</h1>
			<div class="login"><button>ログイン</button>&nbsp;&nbsp;<button>始める</button></div>
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
