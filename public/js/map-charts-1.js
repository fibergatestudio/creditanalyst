/*
* Построение карты Украины
*/    

var colorsArr = [
'#00afff','#00a8ff','#00a1ff','#009aff','#0093ff','#008cff','#0085ff','#007eff','#0077ff','#0070ff',
'#0069ff','#0062ff','#005bff','#0054ff','#004dff','#0046ff','#003fff','#0038ff','#0031ff','#002aff',
'#0023ff','#001cff','#0015ff','#000eff','#0007ff'
];
var regionArr = {
    "0100000000":"4","0500000000":"24","0700000000":"25","1200000000":"5","1400000000":"6",
    "1800000000":"27","2100000000":"23","2300000000":"26","2600000000":"7","3200000000":"12",
    "3500000000":"13","4400000000":"15","4600000000":"14","4800000000":"16","5100000000":"17",
    "5300000000":"18","5600000000":"19","5900000000":"21","6100000000":"22","6300000000":"8",
    "6500000000":"9","6800000000":"10","7100000000":"1","7300000000":"3","7400000000":"2"
};
var backgroundColorMap = ["#FF0000","#A62A00","#008110","#CCC"];
var fullMap = false;
var getString = '';
var sortRegionArr = Object.keys(regionArr).sort(function(a,b){return regionArr[a]-regionArr[b]});
var datasetsArr = [];
var datasetsObj = [];


/*
* Построение графиков
*/

$("#makeChartMap").click(function() {

    $('#makeChartMap').prop( "disabled" , true );

    //Если у нас 1 индикатор
    if (indicatorsAddArr.length == 1){

        var colors = {};

        //Создаем объект данных для этого  индикатора
        for (var j = 0; j < indicatorsObj.length; j++) {
            if (indicatorsObj[j].name === indicatorsAddArr[0]) {
                for (var i = 0; i < dataObj[indicatorsObj[j].id].length; i++) {
                    colors[regionArr[dataObj[[indicatorsObj[j].id]][i].geography]] = colorsArr[i];
                }
            }
            else{
                continue;
            }
        }

        if(Object.keys(colors).length == 0){
            alert('Нет данных для этого индикатора !');
            return 0;
        }

        //формируем строку для передачи на страницу сохранения графика
        getString += 'indicator='+indicatorsAddArr.length;

        for (var key in colors) {
            getString += '&m'+key+'='+colors[key].slice(1);
        }

        $( '#myChartMap' ).vectorMap( {
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

        fullMap = true;

    }

    else if (indicatorsAddArr.length < 1) {
        alert('Выберите индикатор !');
    }

});


/*
* Построение графиков на отдельной странице для сохранения скриншотом
*/

function parseUrlQuery() {
    var data = {};
    if(location.search) {
        var pair = (location.search.substr(1)).split('&');
        for(var i = 0; i < pair.length; i ++) {
            var param = pair[i].split('=');
            data[param[0]] = param[1];
        }
    }
    return data;
}
