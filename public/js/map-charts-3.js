/*
* Построение графиков
*/

$("#makeChartMap").click(function() {
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
        $("#marker-labels").append(indicatorHtml);       

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
