<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name = "viewport" content="width=device-width, initial-scal=1.0">
    <link rel="stylesheet" href="http://<?=$_SERVER["HTTP_HOST"]?>/myproject_homepage/load/load.css?">
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=b9e6e1db4ccc73953c5ca8c7bf1a4f6e"></script>
    <!-- <script src="./js/member.js"></script> -->
	<title>서전주 중학교 > 오시는 길</title>
</head>
<header>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/header.php"; ?>
</header>
<body>
	<h1>오시는 길</h1>
	<h4 class = "come">홈 > 오시는 길</h4>
	<section>
		<div id="map" style="width:800px;height:600px;"></div>
		<script>
			var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
			mapOption = {
				center: new kakao.maps.LatLng(35.81075130435292, 127.1127174572853), // 지도의 중심좌표
				level: 3 // 지도의 확대 레벨
			};  

		// 지도를 생성합니다    
		var map = new kakao.maps.Map(mapContainer, mapOption); 

		// 일반 지도와 스카이뷰로 지도 타입을 전환할 수 있는 지도타입 컨트롤을 생성합니다
		var mapTypeControl = new kakao.maps.MapTypeControl();

		// 지도에 컨트롤을 추가해야 지도위에 표시됩니다
		// kakao.maps.ControlPosition은 컨트롤이 표시될 위치를 정의하는데 TOPRIGHT는 오른쪽 위를 의미합니다
		map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);

		// 지도 확대 축소를 제어할 수 있는  줌 컨트롤을 생성합니다
		var zoomControl = new kakao.maps.ZoomControl();
		map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

		// 지도를 클릭한 위치에 표출할 마커입니다
		var marker = new kakao.maps.Marker({ 
			// 지도 중심좌표에 마커를 생성합니다 
			position: map.getCenter() 
		}); 
		// 지도에 마커를 표시합니다
		marker.setMap(map);

		// 지도에 클릭 이벤트를 등록합니다
		// 지도를 클릭하면 마지막 파라미터로 넘어온 함수를 호출합니다
		kakao.maps.event.addListener(map, 'click', function(mouseEvent) {        
			
			// 클릭한 위도, 경도 정보를 가져옵니다 
			var latlng = mouseEvent.latLng; 
			
			// 마커 위치를 클릭한 위치로 옮깁니다
			marker.setPosition(latlng);
			
			var resultDiv = document.getElementById('clickLatlng'); 
			resultDiv.innerHTML = message;
			
		});
		var infowindow = new kakao.maps.InfoWindow({
            content: '<div style="width:150px;text-align:center;padding:6px 0;">서전주 중학교</div>'
        });
        infowindow.open(map, marker);


		</script>
	</section>
</body>
<footer>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/myproject_homepage/footer.php";?>
</footer>