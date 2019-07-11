@extends('foods.layout')

<style>
@section('style')


.maps{
    height: 450px;
    overflow: scroll;margin:10px 0 100px 0;
    margin-top: 30px;
    background-color: #f5f5f5;
    border:solid 7px #f5f5f5;
    border-radius: 5px;
}


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

@if($items->count() ==1)
.maps{
    height: auto;
   background-color: #fff;
   border-color: #fff;
   margin:30px 0 0 0;
}

.content{
    margin:25px 0px 0px 0px;
    }
    @endif

#sample {
 width: 100%;
   height: 400px;
   border: 4px solid #CCC;
   border-radius: 3px;
   margin:0;

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
    margin-bottom: 50px;
}
.sub_title span{
    font-size:1.5vw;
}

.star{
    color: #F2F5A9;
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
}
@media(max-width: 700px){
.content{
    margin:25px 0px 0px 0px;
}
}

@media (max-width: 500px) {
    .page-main {
    margin:0 0 0 2vh;
}

@media (max-width: 400px) {
    .p_text p{
   margin: 0 0 0 0;
}
}

@endsection
</style>


@section('pan')
Map
@endsection

@section('comment')
地図上から、お探しの投稿を見つけましょう。
@endsection


@section('sub_title')
地図ページ<span></span>
@endsection






@section('content')
<form  action="Map" method="POST"> 
    {{csrf_field()}}
    <input class="ok" type="text" id ="text" name="text" style="width: 50vw;margin:0; font-size:1.5vw;">
    <input type="submit" value="住所検索" style="font-size:1.5vw;">
    <p style="color: #ff6347;font-size:1vw;">（例）東京　新宿</p>
</form>


 @if(!$posts->count() == 0)
<p style="font-size: 1.3vw; color: #191970;">[ {{$input}} ]<span style="font-size: 1vw; color: black;"> : 検索結果 ( {{$items->count()}} ) 件</span></p>
<div id="sample"></div>

<div class="maps">
    @php
    $i=0;
    @endphp

@foreach ($posts as $post)
 <div class="content">
    @php
    $i++;
    @endphp

    @isset($post->image_url)
    <img src="{{$post->image_url}}" alt="{{$post->title}}" width="100%">
    @endisset
   
    <h1>@if($i==1)①
        @elseif($i==2)②
        @elseif($i==3)③
        @elseif($i==4)④
        @elseif($i==5)⑤
        @endif&nbsp;{{$post->title}}&nbsp;</h1>
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
<div>&nbsp;</div>
</div>
<div class="mt-5 d-flex justify-content-center mb-1">
        {{ $posts->links() }}
    </div>
@else
<p style= "font-size: 1.3vw; color: #191970;">[ {{$input}} ]<span style="font-size: 1vw; color: #ff6347;"> : 検索結果（ ０件 ）</span></p>

 @endif



<script type="text/javascript" src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>

<script>

var map;
var marker = [];
var infoWindow = [];



var markerData = [ // マーカーを立てる場所名・緯度・経度 
  @foreach($posts as $a)
  {
    name: '{{$a->title}}',
    lat: {{$a->lat}},
    lng: {{$a->lng}},
    evaluation: 
            @if($a->evaluation==5)'★★★★★'
            @elseif($a->evaluation==4)'★★★★'
            @elseif($a->evaluation==3)'★★★'
            @elseif($a->evaluation==2)'★★'
            @elseif($a->evaluation==1)'★'
            @endif,
    address :'{{$a->address}}',
    url :{{$a->id}},
 },
 @endforeach
];


 
function initMap() {
 // 地図の作成
    var mapLatLng = new google.maps.LatLng({lat: markerData[0]['lat'], lng: markerData[0]['lng']}); // 緯度経度のデータ作成
   map = new google.maps.Map(document.getElementById('sample'), { // #sampleに地図を埋め込む
     center: mapLatLng, // 地図の中心を指定
      zoom: 15 // 地図のズームを指定
   });
 
 // マーカー毎の処理
 for (var i = 0; i < markerData.length; i++) {
        markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']}); // 緯度経度のデータ作成
        marker[i] = new google.maps.Marker({ // マーカーの追加
         position: markerLatLng, // マーカーを立てる位置を指定
            map: map // マーカーを立てる地図を指定
       });

       var nunber=i+9312;

       var content ='<div class="sample">' + '<span class="star" style="font-size:5px;">'+ markerData[i]['evaluation'] +'</span>'+'<br>'+'<span style="margin:0;font-size:2;color:black;">'+'&#'+nunber+';'+'&nbsp;'+ markerData[i]['name'] +'<br>'+'住所:'+markerData[i]['address']+'</span>'+'</div>';

     infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加 
         content: content,
         // 吹き出しに表示する内容
       });
 
     markerEvent(i); // マーカーにクリックイベントを追加
 }
}
 
// マーカーにクリックイベントを追加
function markerEvent(i) {
    marker[i].addListener('click', function() { // マーカーをクリックしたとき
      infoWindow[i].open(map, marker[i]); // 吹き出しの表示
  });
}
</script> 
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBWGVkl90qpryhG_Fglt8fXZolre1uld3c&callback=initMap" async defer></script>
 
@endsection

