window.BX_YMapAddPlacemark = function(map, arPlacemark, isClustered){
	if (null == map)
		return false;

	if(!arPlacemark.LAT || !arPlacemark.LON)
		return false;

	var props = {};
	var markerSVG = ymaps.templateLayoutFactory.createClass([
	'<div class="marker"><svg xmlns="http://www.w3.org/2000/svg" width="46" height="61.156" viewBox="0 0 46 61.156"><defs><style>.cls-10,.cls-20 {fill: #fff;}.cls-20, .cls-30{fill-rule: evenodd;}.cls-20{opacity: 0.7;}</style></defs><circle class="cls-10" cx="23" cy="23" r="12"></circle><path class="cls-20" d="M1000,742a23,23,0,1,1-23,23A23,23,0,0,1,1000,742Zm17,30,2,6s-18.31,23.26-19,24a4.464,4.464,0,0,1-4,1c-0.76-.313-2.159-0.161-2-4s3-23,3-23Z" transform="translate(-977 -742)"></path><path id="Ellipse_196_copy_4" data-name="Ellipse 196 copy 4" class="cls-30" d="M1015.99,776.977L1016,777l-18,23h-1l2.178-15.041A20.016,20.016,0,1,1,1015.99,776.977ZM1000,754a11,11,0,1,0,11,11A11,11,0,0,0,1000,754Z" transform="translate(-977 -742)"></path></svg></div>'
	].join(''));
	
	if (null != arPlacemark.TEXT && arPlacemark.TEXT.length > 0)
	{
		var value_view = '';

		if (arPlacemark.TEXT.length > 0)
		{
			var rnpos = arPlacemark.TEXT.indexOf("\n");
			value_view = rnpos <= 0 ? arPlacemark.TEXT : arPlacemark.TEXT.substring(0, rnpos);
		}

		props.balloonContent = arPlacemark.TEXT.replace(/\n/g, '<br />');
		props.hintContent = value_view;
	}
	var option = {
		iconImageSize: [46, 57],
		iconImageOffset: [-23, -29],
		item: arPlacemark.ITEM_ID,
		iconLayout: markerSVG
	};

	var obPlacemark = new ymaps.Placemark(
		[arPlacemark.LAT, arPlacemark.LON],
		props,
		option,
		{balloonCloseButton: true}
	);

	if(!isClustered) { map.geoObjects.add(obPlacemark); }

	return obPlacemark;
}

if (!window.BX_YMapAddPolyline)
{
	window.BX_YMapAddPolyline = function(map, arPolyline)
	{
		if (null == map)
			return false;

		if (null != arPolyline.POINTS && arPolyline.POINTS.length > 1)
		{
			var arPoints = [];
			for (var i = 0, len = arPolyline.POINTS.length; i < len; i++)
			{
				arPoints.push([arPolyline.POINTS[i].LAT, arPolyline.POINTS[i].LON]);
			}
		}
		else
		{
			return false;
		}

		var obParams = {clickable: true};
		if (null != arPolyline.STYLE)
		{
			obParams.strokeColor = arPolyline.STYLE.strokeColor;
			obParams.strokeWidth = arPolyline.STYLE.strokeWidth;
		}
		var obPolyline = new ymaps.Polyline(
			arPoints, {balloonContent: arPolyline.TITLE}, obParams
		);

		map.geoObjects.add(obPolyline);

		return obPolyline;
	}
}