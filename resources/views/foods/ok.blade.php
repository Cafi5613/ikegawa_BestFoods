<!DOCTYPE html>
<html>
<head>
  <title>ok</title>
</head>
<style>
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

#sample {
 width: 700px;
   height: 400px;
}
</style>
<body>
<div id="sample"></div>


<script type="text/javascript" src="{{asset('/js/jquery-3.4.1.min.js')}}"></script>
<script>
var map;
var marker = [];
var infoWindow = [];
var markerData = [ // マーカーを立てる場所名・緯度・経度
  {
       name: 'TAM 東京',
       lat: 35.6812362,
        lng: 139.7671248,
        icon: 'tam.png' // TAM 東京のマーカーだけイメージを変更する
 }, {
        name: '小川町駅',
     lat: 35.6951212,
        lng: 139.76610649999998
 }, {
        name: '淡路町駅',
     lat: 35.69496,
      lng: 139.76746000000003
 }, {
        name: '御茶ノ水駅',
        lat: 35.6993529,
        lng: 139.76526949999993
 }, {
        name: '神保町駅',
     lat: 35.695932,
     lng: 139.75762699999996
 }, {
        name: '新御茶ノ水駅',
       lat: 35.696932,
     lng: 139.76543200000003
 }
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
 
     infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content: '<div class="sample">' + markerData[i]['name'] + '</div>' // 吹き出しに表示する内容
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
<!-- YOUR_API_KEYの部分は取得した APIキーで置き換えます。 --> 
</body>
</html>

<!DOCTYPE html>
<html>
<head>
  <title>ok</title>
</head>
<style>
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

#sample {
 width: 700px;
   height: 400px;
}
</style>
<body>
<div id="sample"></div>

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
 
     infoWindow[i] = new google.maps.InfoWindow({ // 吹き出しの追加
         content: '<div class="sample">' + markerData[i]['name'] + '</div>' // 吹き出しに表示する内容
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
<!-- YOUR_API_KEYの部分は取得した APIキーで置き換えます。 --> 
</body>
</html>



