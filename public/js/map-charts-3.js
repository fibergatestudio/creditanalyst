/*
* Построение графиков
*/

$("#makeChartMap").click(function() {

    //Если у нас больше 1 индикатора
    if(indicatorsAddArr.length > 1){

        //Выводим карту
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
            color: '#00a8ff',
            borderColor: 'yellow',
            backgroundColor: 'yellow',
            enableZoom: false,
            showTooltip: false,
            selectedColor: null,
            hoverColor: null,
            onRegionClick: function ( event, code, region ) {
                event.preventDefault();
            }
        } );
        //Если у нас больше 1 индикатора
        if(indicatorsAddArr.length > 1){
        //Cоздаем объект данных согласно индикаторам

        //выбираем нужные данные из объекта dataObj в массив datasetsArr
        for (var j = 0; j < indicatorsAddArr.length; j++) {

            for (var k = 0; k < indicatorsObj.length; k++) {

                if (indicatorsAddArr[j] === indicatorsObj[k].name){

                    var tempArr = [];

                    for (var i = 0; i < sortRegionArr.length; i++){

                        var temp = undefined;

                        for (var l = 0; l < dataObj[indicatorsObj[k].id].length; l++){

                            if (dataObj[indicatorsObj[k].id][l].geography === sortRegionArr[i]) {
                                temp = dataObj[indicatorsObj[k].id][l].value;
                                break;
                            }
                        }
                        if (temp === undefined) {
                            tempArr.push(0);
                        }
                        else{
                            tempArr.push(temp);
                        }
                    }
                    datasetsArr.push(tempArr);
                }
            }
        }

        //формируем строку для передачи на страницу сохранения графика
        for (var i = 0; i < indicatorsAddArr.length; i++){
            for (var j = 0; j < indicatorsObj.length; j++){
                if (indicatorsAddArr[i] === indicatorsObj[j].name) {
                    if (getString === '') {
                        getString += 'indicator'+i+'='+indicatorsObj[j].id;
                    }
                    else{
                        getString += '&indicator'+i+'='+indicatorsObj[j].id;
                    }
                }
            }
        }

        for (var i = 0; i < datasetsArr.length; i++){
            for (var j = 0; j < 25; j++) {
                getString += '&'+i+'-'+j+'='+datasetsArr[i][j];
            }
        }

        //создаем массив объектов datasetsObj для передачи данных в диаграмму
        for (var j = 0; j < sortRegionArr.length; j++){
            var tempObj = {};
            var tempData = [];
            var tempBack = [];
            for (var i = 0; i < datasetsArr.length; i++) {
                tempData.push(datasetsArr[i][j]);
                tempBack.push(backgroundColorMap[i]);
            }
            //переводим данные индикаторов tempData в проценты
            var sum = 0;
            for (var i = 0; i < tempData.length; i++) {
                sum += tempData[i];
            }
            var percent = sum/100;
            for (var i = 0; i < tempData.length; i++) {
                tempData[i] = Math.round(tempData[i]/percent);
            }
            var sum = 0;
            for (var i = 0; i < tempData.length; i++) {
                sum += tempData[i];
            }
            if ((100 - sum) !== 0) {
                tempData[0] += 100 - sum;
            }
            tempObj = {
                data: tempData,
                backgroundColor: tempBack
            }
            datasetsObj.push(tempObj);
        }

        var indicatorHtml = '';

        //Выводим маркеры индикаторов на карту
        for (var i = 0; i < indicatorsAddArr.length; i++) {
            indicatorHtml += `<div class="marker-color" id="m-color-`+(i+1)+`"></div><div>`+indicatorsAddArr[i]+`</div>`;
        }
        $("#marker-labels").html(indicatorHtml);

        //Выводим диаграммы на карту
        for (var i = 1; i < 26; i++) {

            var ctx = document.getElementById("marker-"+i);
            ctx.height = 60;
            var myChart = new Chart( ctx, {
                type: 'doughnut',
                data: {
                    datasets: [ datasetsObj[i-1] ],
                    labels: false//отключение маркеров легенды
                },
                options: {
                    animation: {
                        duration: 0,
                    },
                    hover: {
                        animationDuration: 0,
                    },
                    responsiveAnimationDuration: 0,
                }
            });
        }

        fullMap = true;

    }
});
