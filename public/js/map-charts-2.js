if (Object.keys(parseUrlQuery()).length != 0) {

    var getString = location.search;
    var markerObj = parseUrlQuery();
    var fileName = '';
    var numberIndicator = '';
    var idIndicatorArr = [];
    var indicatorId = '';

    for (key in markerObj) {
        if (key == 'fileName') {
            fileName = markerObj[key];
        }
        else if (key == 'indicator') {
            numberIndicator = markerObj[key];
        }
        else if (key == 'indicatorId') {
            indicatorId = markerObj[key];
        }
        else if (key.slice(0, -1) == 'indicator') {
            idIndicatorArr.push(parseInt(markerObj[key]));
            numberIndicator = idIndicatorArr.length;
        }
    }


    //Если у нас 1 индикатор
    if (parseInt(numberIndicator) === 1) {       

        var colors = {};

        for (key in markerObj){
            if (key !== 'fileName' && key !== 'indicator' && key !== 'fileExport' && key !== 'fileExportToWord' && key !== 'indicatorId'){
                colors[key.slice(1)] = '#'+ markerObj[key];
            }
        }

        //Генерируем карту Украины с разным цветом областей
        $( '#saveChartMap' ).vectorMap( {
            map: 'ukraine_merc_en',
            pins: { 
                "1" : "\u003cdiv class=\"map-content\"\u003eЧеркасская\u003c/div\u003e\u003ccanvas id=\"marker-1\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "2" : "\u003cdiv class=\"map-content\"\u003eЧерниговская\u003c/div\u003e\u003ccanvas id=\"marker-2\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "3" : "\u003cdiv class=\"map-content\"\u003eЧерновецкая\u003c/div\u003e\u003ccanvas id=\"marker-3\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "4" : "\u003cdiv class=\"map-content\"\u003eКрым\u003c/div\u003e\u003ccanvas id=\"marker-4\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "5" : "\u003cdiv class=\"map-content\"\u003eДнепропетровская\u003c/div\u003e\u003ccanvas id=\"marker-5\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "6" : "\u003cdiv class=\"map-content\"\u003eДонецкая\u003c/div\u003e\u003ccanvas id=\"marker-6\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "7" : "\u003cdiv class=\"map-content\"\u003eИвано-Франковская\u003c/div\u003e\u003ccanvas id=\"marker-7\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "8" : "\u003cdiv class=\"map-content\"\u003eХарьковская\u003c/div\u003e\u003ccanvas id=\"marker-8\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "9" : "\u003cdiv class=\"map-content\"\u003eХерсонская\u003c/div\u003e\u003ccanvas id=\"marker-9\" class=\"marker-map\"\u003e\u003c/canvas\u003e",        
                "10" : "\u003cdiv class=\"map-content\"\u003eХмельницкая\u003c/div\u003e\u003ccanvas id=\"marker-10\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "12" : "\u003cdiv class=\"map-content\"\u003eКиевская\u003c/div\u003e\u003ccanvas id=\"marker-11\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "13" : "\u003cdiv class=\"map-content\"\u003eКировоградская\u003c/div\u003e\u003ccanvas id=\"marker-12\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "14" : "\u003cdiv class=\"map-content\"\u003eЛьвовская\u003c/div\u003e\u003ccanvas id=\"marker-13\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "15" : "\u003cdiv class=\"map-content\"\u003eЛуганская\u003c/div\u003e\u003ccanvas id=\"marker-14\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "16" : "\u003cdiv class=\"map-content\"\u003eНиколаевская\u003c/div\u003e\u003ccanvas id=\"marker-15\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "17" : "\u003cdiv class=\"map-content\"\u003eОдесская\u003c/div\u003e\u003ccanvas id=\"marker-16\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "18" : "\u003cdiv class=\"map-content\"\u003eПолтавская\u003c/div\u003e\u003ccanvas id=\"marker-17\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "19" : "\u003cdiv class=\"map-content\"\u003eРовенская\u003c/div\u003e\u003ccanvas id=\"marker-18\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "21" : "\u003cdiv class=\"map-content\"\u003eСумская\u003c/div\u003e\u003ccanvas id=\"marker-19\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "22" : "\u003cdiv class=\"map-content\"\u003eТернопольская\u003c/div\u003e\u003ccanvas id=\"marker-20\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "23" : "\u003cdiv class=\"map-content\"\u003eЗакарпатская\u003c/div\u003e\u003ccanvas id=\"marker-21\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "24" : "\u003cdiv class=\"map-content\"\u003eВинницкая\u003c/div\u003e\u003ccanvas id=\"marker-22\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "25" : "\u003cdiv class=\"map-content\"\u003eВолынская\u003c/div\u003e\u003ccanvas id=\"marker-23\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "26" : "\u003cdiv class=\"map-content\"\u003eЗапорожская\u003c/div\u003e\u003ccanvas id=\"marker-24\" class=\"marker-map\"\u003e\u003c/canvas\u003e",
                "27" : "\u003cdiv class=\"map-content\"\u003eЖитомирская\u003c/div\u003e\u003ccanvas id=\"marker-25\" class=\"marker-map\"\u003e\u003c/canvas\u003e",         
            },
            pinMode: 'content',
            borderColor: 'yellow',
            backgroundColor: 'yellow',    
            enableZoom: false,
            showTooltip: false,
            selectedColor: null,
            hoverColor: null,
            colors: colors,   
            onRegionClick: function ( event, code, region ) {      
                event.preventDefault();
            }
        } );
    }

    //Выводим название индикатора
    $('.marker-color-one div:last-child').text(indicatorsObjName[indicatorId]);
    console.log(indicatorsObjName[indicatorId]);

    fullMap = true;

}