@extends('foods.layout')
<style>

@section('style')
#map_container {
  clear: both;
  width: 25%;
  padding: 4px;
  border: 1px solid #CCC;
}
#map_canvas {   /* 高さ（と幅）を指定しないと地図は表示されない */
  width: 100%;
  height: 180px;
}
#url, #zoom {
  display: none;  /* 非表示 */
}
/* 情報ウィンドウ（マーカーをクリックすると表示される領域）内 */
#map_content {
  width: 2px;
  height: 7px;
}

.jumbtoron-extend{
    display: none;
}
@endsection
</style>

 @section('content')

              <div class="mb-4 text-right">
    <a class="btn btn-primary" href="{{ route('foods.edit', $post->id) }}">
        編集する
    </a>
   <form
    style="display: inline-block;"
    method="POST"
    action="{{ route('foods.destroy', $post->id) }}">
    
    @csrf
    @method('DELETE')

    <button class="btn btn-danger">削除する</button>
</form>
</div>
<p>{{$post->id}}</p>
<div id="map_info">
  <p id="venue">{{$post->store_name}}</p>
  <p id="address">{{$post->address}}</p>
  <p id="url"></p>
  <p id="zoom">17</p>
</div>
<div id="map_container">
  <div id="map_canvas"></div>
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

