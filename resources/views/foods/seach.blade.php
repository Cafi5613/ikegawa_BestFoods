<head>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

@extends('foods.layout')

<style>
@section('style')

.content{
    margin:0 3vh 30px 3vh;
    display: grid;
    grid-template-columns:repeat(12,1fr);
    grid-template-rows: repeat(9,1fr);
    grid-column-gap: 20px;
    border: solid 3px #ffe4c4;
    padding-bottom: 0px;
    background-color: #fffafa;
    border-radius: 3px;
}

@media (min-width: 1200px) {
    .content{
    margin:0 12vh 30px 12vh;
}
}

.content img{
    grid-column: 1/5;
    grid-row: 2/13;
    margin: 0 0 2vh 2vh;
    font-size:3vw;
    border-radius: 5px;
}

.content h2{
    grid-column:5/13;
    grid-row: 9;
    text-align: center;
    word-break: break-word;
    font-size: 0.8vw;
    margin: 0;
}

.content h1{
    margin-bottom: 10px;
    grid-column: 6/13;
    grid-row: 2/3;
    word-break: break-word;
    font-size:2vw;
    font-weight: bold;
    margin:0 ;
}

.p_text {
    grid-column: 6/13;
    grid-row: 3/10;
    word-break: break-word;
    margin-top:  10px;z
    padding: 0;
    font-size:1.5vw;
}

.p_text p{
    margin:1vh 0 0 1vh;
}

.content a{
    grid-column: 10/12;
    grid-row: 8;
    text-align: center;
    font-size:1vw;
    word-break: break-word;
    margin: 0;
}

.pan{
   border-bottom: solid 1px #cccccc;
   padding-bottom: 0;
}

.sub_title{
    border-left: 4px solid red;
    margin-top: 4vh;
    font-size:3vw;
    margin-bottom: 30px;
}
.sub_title span{
    font-size:1.5vw;
}

.star{
    color: #F2F5A9;
}

.check{
    font-size:1.5vw;
}

.submitt{
    margin:10px;
    clear: both;
    float: left;
    font-size:1vw;
    margin-top: 20px;
}
@media (max-width: 850px) {
    .page-main {
    grid-column: 1;
    grid-row: 2;
    margin:0 10vh 0 10vh;
    }

    .content img{
    grid-column: 1/6;
    grid-row: 2/13;
    margin: 0 0 2vh 2vh;
    font-size:3vw;
    }

    .check{
    font-size:1vw;
}
}

.seach{
    background-color: #eaeaea; 
    padding:10px; width: 100%; 
    height: 130px;   
    border-radius: 3px;
    overflow: scroll;
}

@media(max-width: 700px){
.content{
    margin:0 3vh 30px 3vh;
}
}


@media (max-width: 500px) {
    .page-main {
    margin:0 2vh 0 2vh;
}
.content img{
    margin: 0 1vh 1vh 1vh;
    }
  
}

@media (max-width: 400px) {
    .p_text p{
   margin: 0 0 0 0;
}
}

@endsection
</style>
@section('pan')
Seach
@endsection

@section('comment')
あなたのお探しのものを見つけましょう。
@endsection


@section('sub_title')
検索
@endsection

@section('content') 
<div class="seach" style="background-color: #eaeaea; padding:10px; width: 100%; height: 130px;   border-radius: 3px;">  

<form action="seach" method="POST"> 
    {{csrf_field()}}
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="モーニング" >&nbsp;&nbsp; モーニング
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="ランチ" >&nbsp;&nbsp; ランチ
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="ディナー" >&nbsp;&nbsp; ディナー
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="和食" >&nbsp;&nbsp; 和食
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="洋食" >&nbsp;&nbsp; 洋食
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="中華" >&nbsp;&nbsp; 中華
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="アジア/エスニック/無国籍" >&nbsp;&nbsp; 和食
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="カフェ" >&nbsp;&nbsp; カフェ
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="ファーストフード" >&nbsp;&nbsp; ファーストフード
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="ファミレス" >&nbsp;&nbsp; ファミレス
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="和食居酒屋" >&nbsp;&nbsp; 和食居酒屋
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="洋食居酒屋" >&nbsp;&nbsp; 洋食居酒屋
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="アジア/エスニック/無国籍居酒屋" >&nbsp;&nbsp; アジア/エスニック
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="ダイニングバー/ビアガーデン" >&nbsp;&nbsp; ダイニングバー/ビアガーデン
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="ラーメン屋" >&nbsp;&nbsp; ラーメン屋
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="郷土料理" >&nbsp;&nbsp; 郷土料理
        </div>
        <div class="check" style="margin-left: 1vh;margin-right: 1vh;float: left;">
            <input id="genre" name="genre[]" type="checkbox" value="その他" >&nbsp;&nbsp; その他
        </div>
</div>
        <input class="submitt" type="submit" value="検索"><div style="margin:25px 0 40px 0; font-size:1vw;">&nbsp;&nbsp;&nbsp;&nbsp;結果:({{$items->count()}}件)</div>
 </form>




 @if($items->count() == 0)
　　<p><p>
 @endif


 @foreach ($items as $post)
 <div style="clear: both;" class="content">
    
    @isset($post->image_url)
    <img src="{{$post->image_url}}" alt="{{$post->title}}" width="100%">
    @endisset
   
    <h1>&nbsp;{{$post->title}}&nbsp;</h1>
    <div class="p_text">
        <p>評価：
            <span class="star">
            @if($post->evaluation==5)★★★★★
            @elseif($post->evaluation==4)★★★★
            @elseif($post->evaluation==3)★★★
            @elseif($post->evaluation==2)★★
            @elseif($post->evaluation==1)★
            @endif
            </span>
        </p>
        <p>本文：{!! e(str_limit($post->body, 30)) !!}</p>
        <p>電話：@if($post->phone_number == "") .......... @endif {{$post->phone_number}}</p>
        <p>住所：@if($post->address == "") .......... @endif {!! e(str_limit($post->address, 25)) !!}</p>
        <a class="card-link"  href="{{ route('foods.show', $post->id) }}" style="float: right; padding-right: 2vh">   
        詳細</a>
    </div>
</div>
 @endforeach

@isset($items)
 <div class="mt-5 d-flex justify-content-center mb-5">
        {{ $items->links() }}
 </div> 
 @endisset
</div>
@endsection