// GoogleMapsAPI を呼び出すときにcallback=initMapと記述しているので、initMap関数を作成。

function initMap(){
  map = document.getElementById("map");

  // 東京タワーの緯度、経度 35.6585769、139.7454506
  let tokyoTower = {lat: 35.6585769, lng: 139.7454506};

  // option
  opt = {
    zoom: 13, // 地図の縮尺
    center: tokyoTower, // 中心を東京タワーに指定
  };

  // 地図のインスタンスを作成。arg1: 描画する領域 arg2: オプションの指定
  mapObj = new google.maps.Map(map, opt);
}