@extends('foods.layout')
<style>

@section('style')
/* メイン画面 */
.jumbtoron-extend{
    display: none;
}

/* コンテンツ */
.content{
    display: grid;
    grid-template-columns:repeat(10,1fr);
    grid-gap: 10px;
}

/* コンテンツ　タイトル */
.content >.titles{
    margin-top: 4vh;
    padding-left: 20px;
    width: 100%;
    grid-column: 1/11;
    grid-row: 2;
    font-weight: bold;
    border-left: solid 0px #b7a077;
    font-size:2.5vw;
    padding-bottom: 0;
    vertical-align: text-bottom;
    word-break: break-word;
    text-align: center;
    color: #3f4f4f;
    margin-bottom: 60px;
    display: none;
}

/* コンテンツ　メニュー */
.content>.menu{
    grid-column: 1/6;
    grid-row: 3;
    color: #3f4f4f;
    font-size:2.5vw;
    margin: 1vh 0  3vh 2vh ;
}

.star{
    color: #F2F5A9;
    font-size:1.5vw;
    float: right;
    margin-right: 15px;
  }
/* コンテンツ　時間 */
.time{
    grid-column: 6/11;
    grid-row: 3;
    font-size:2vw;
    margin: 1vh 2vh  3vh 0 ;
    text-align: right;
}
/* コンテンツ　メイン画像 */
.main_img{
    margin-top: 3vh;
    grid-column: 1/11;
    grid-row: 4/10;
    border-radius: 8px;
    border: solid 4px;
    border-color: #ffe4c4;
    width: 100%
}


/* コンテンツ　テキスト */
.text{
    grid-column: 1/11;
    grid-row: 12/15;
    margin:4vh 0 0 0vh;
    font-size:2.5vw;
    word-break: break-word;
}
/* 基本情報ボックス */
.information{
    grid-column: 1/11;
    grid-row: 18/20;
    margin: 3vh 0 3vh 0;
}

/* 基本情報 */
.information_texts{
    grid-column: 1/11;
    grid-row: :17;
    border-left: solid 5px #ffd700;
    padding-left: 15px;
    font-size:2.5vw;
    margin-bottom: 10vh;
}

/* 基本情報テーブル */
.box {
    display: grid;
    width: calc(100% - 10px);
    border-top: 4px solid #96ceb4;
    border-left: 4px solid #96ceb4;
    grid-auto-rows: auto;
    grid-template-columns: 20% 80%;
    margin: 3vh 0 3vh 0;
}

.box__itmes {
  font-size: 16px;
  padding: .25rem .25rem .25rem .5rem;
  color: #444;
  border-right: 4px solid #96ceb4;
  border-bottom: 4px solid #96ceb4;
}

/* 基本情報タイトル */
.box__title {
    font-size: 18px;
    font-weight: bold;
    background-color: #ffeead;
}
/* 基本情報 店舗画像 */
.store_img{
    margin: 5% 15% 5% 15%;

}

/* 基本情報 マップ */
.map_titel{
    grid-column: 1/11;
    grid-row:21;
    border-left: solid 5px #ffd700;
    padding-left: 15px;
    font-size:2.5vw;
}

/* mapの表示 */
.map_img {
    margin: 3vh 0 3vh 0 ;
    grid-column: 1/11;
    grid-row: 22;
}
#map_container {
    clear: both;
    width: 100%;
    padding: 4px;
    border: 1px solid #CCC;
}
#map_canvas {   /* 高さ（と幅）を指定しないと地図は表示されない */
    width: 100%;
    height: 80vh;
}
#url, #zoom {
    display: none;  /* 非表示 */
}
/* 情報ウィンドウ（マーカーをクリックすると表示される領域）内 */
#map_content {
    width: 2px;
    height: 7px;
}


@media screen and (max-width: 810px) {
  .box {
    grid-auto-columns: auto;
  }


  #map_canvas {   /* 高さ（と幅）を指定しないと地図は表示されない */
    width: 100%;
    height:50vh;
}
}


@media screen and (max-width: 810px) {
  .box__itmes {
    grid-column: 1 / 3;
  }

@media(min-width: 810px) {
  .btn-primary{
    font-size:2vw; padding: 3px 10px 3px 10px;
  }
  .btn-danger{
    font-size:2vw; padding: 3px 10px 3px 10px;
  }
}


@media screen and (max-width: 450px) {
   #map_canvas {   /* 高さ（と幅）を指定しないと地図は表示されない */
    width: 100%;
    height:30vh;
}
}
@endsection
</style>
@section('pan')
Show
@endsection

@section('comment')
投稿した記事の詳細ページです。編集や削除もできます。
@endsection



@section('content')
<script>
    /**
     * 確認ダイアログの返り値によりフォーム送信
    */
    function submitChk () {
        /* 確認ダイアログ表示 */
        var flag = confirm ( "投稿を削除しますか？");
        /* send_flg が TRUEなら送信、FALSEなら送信しない */
        return flag;
    }
</script>

<div class="content">
 @section('sub_title'){{$post->title}}<span class="star">
            @if($post->evaluation==5)★★★★★
            @elseif($post->evaluation==4)★★★★
            @elseif($post->evaluation==3)★★★
            @elseif($post->evaluation==2)★★
            @elseif($post->evaluation==1)★
            @endif
            </span>@endsection
  <p class="menu">{{$post->menu}}</p>
  <p class="time">{!!$time = date_format($post->created_at, 'Y-m-d'); !!}</p>
  <h2 class="text">{!! nl2br(e(str_limit($post->body,1000))) !!}</h2>
  <img class="main_img" src="{{ asset($post->image_url) }}" alt="{{$post->title}}"  width="100%">
  <div class="information">
    <h1 class="information_texts">基本情報</h1>
    <div class="box">
      <div class="box__itmes box__title">店舗名</div>
      <div class="box__itmes">{{$post->store_name}}</div>
      
      @isset($post->store_image)
      <div class="box__itmes box__title">外観</div>
      <div class="box__itmes">
        <img class="store_img" src="{{asset($post->store_url)}}" width="60%">
      </div>
      @endisset
      
      @isset($post->phone_number)
      <div class="box__itmes box__title">電話番号</div>
      <div class="box__itmes">{{$post->phone_number}}</div>
      @endisset

      @isset($post->holiday)
      <div class="box__itmes box__title">定休日</div>
      <div class="box__itmes">{{$post->holiday}}</div>
      @endisset

      <div class="box__itmes box__title">住所</div>
      <div class="box__itmes">{{$post->address}}
      </div>
    </div>
  </div>
  
  <div class="map_titel">地図</div>  
  <div class="map_img">
    <div id="map_info">
      <p style="display: none;" id="venue">{{$post->store_name}}</p>
      <p style="display: none;" id="address">{{$post->address}}</p>
      <p id="url"></p>
      <p id="zoom">17</p>
    </div>
    <div  id="map_container">
      <div  id="map_canvas"></div>
    </div>
  </div>

  <div style="grid-column:5;grid-row:23;">
    <form  style="display: inline-block;"  method="post" action="{{ route('foods.destroy', ['post' => $post]) }}" onsubmit="return submitChk()">
      @csrf
      @method('DELETE')
      <input class="btn btn-danger"  type="submit" value="投稿の削除"/>
    </form>
  </div>
    <div style="grid-column:6;grid-row:23; ">
  <div class="mb-4">
    <a class="btn btn-primary" href="{{ route('foods.edit', ['post' => $post]) }}">投稿の編集</a>
  </div>
</div>
</div>
  @endsection
<!-- jQuery の読み込み --> 
<script type="text/javascript" src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>

<script>
  function initMap() {
    jQuery(function($){
      var map, map_center;
      //初期のズーム レベル（指定がなければ 16）
      var zoom = $("#zoom").text() ?  parseInt($("#zoom").text()): 16;
      //マーカーのタイトル
      var title = $('#venue').text();
      //マップ生成のオプション
      //center は Geolocation から取得して後で設定
      var opts = {
        zoom: zoom,
        mapTypeId: "roadmap"  //初期マップ タイプ  
      };
      //マップのインスタンスを生成
      map = new google.maps.Map(document.getElementById("map_canvas"), opts);
      //ジオコーディングのインスタンスの生成
      var geocoder = new google.maps.Geocoder();
      var address = $('#address').text();
      var my_reg = /〒\s?\d{3}(-|ー)\d{4}/;
      //郵便番号を含めるとおかしくなる場合があったので、郵便番号は削除
      address = address.replace(my_reg, '');

      //geocoder.geocode() にアドレスを渡して、コールバック関数を記述して処理
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status === 'OK' && results[0]) {
        //results[0].geometry.location に緯度・経度のオブジェクトが入っている
        map_center = results[0].geometry.location;
        //地図の中心位置を設定
        map.setCenter(map_center);
        //マーカーのインスタンスを生成
        var marker = new google.maps.Marker({
          //マーカーを配置する Map オブジェクトを指定
          map: map,
          //マーカーの初期の場所を示す LatLng を指定  
          position: map_center,  
          //マーカーをアニメーションで表示
          animation: google.maps.Animation.DROP,  
          title: title
        });
 
        //情報ウィンドウに表示するコンテンツを作成
        //urlが指定してあればリンクつきのタイトルと住所を表示（URLがない場合もあるため）
        var url = $("#url a").attr('href');
        var content;
        if (url) {
          content = '<div id="map_content"><p><a href="' + url + '" target="_blank"> ' + title + '</a><br />' + address + '</p></div>';
        }else {
          //urlが指定してなければ、リンクなしのタイトルと住所を表示
          content = '<div id="map_content"><p>' + title + '<br />' + address + '</p></div>';
        }
 
        //情報ウィンドウのインスタンスを生成
        var infowindow = new google.maps.InfoWindow({
          content: content,
        });
 
        //marker をクリックすると情報ウィンドウを表示(リスナーの登録）
        google.maps.event.addListener(marker, 'click', function() {
          //第2引数にマーカーを指定して紐付け
          infowindow.open(map, marker);
        });
      } else {
        alert("住所から位置の取得ができませんでした。: " + status);
      }
    });    
  }); 
}
</script> 
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBWGVkl90qpryhG_Fglt8fXZolre1uld3c&callback=initMap" async defer></script>
<!-- YOUR_API_KEYの部分は取得した APIキーで置き換えます。 --> 
</body>
</html>

