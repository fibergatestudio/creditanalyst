/*
* Добавление индикатора
*/

var indicatorsObj = JSON.parse(indicators);
var indicatorsAddArr = [];
var measurement = '';
var indicatorsArr = JSON.parse(indicatorsName);
//поиск с автокомплитом
$("#searchIndicator").keyup(function() {
    var html = '';
    $("#resultIndicator").html(html);
    var value = $(this).val().toLowerCase();
    for (var i = 0; i < indicatorsObj.length; i++) {
        var string = indicatorsObj[i].name.toLowerCase();                     
        if (string.indexOf(value) + 1) {
            if (indicatorsAddArr.length > 0) {
                if (measurement === '') {
                    for (var j = 0; j < indicatorsObj.length; j++){
                        if (indicatorsObj[j].name === indicatorsAddArr[0]) {
                            measurement = indicatorsObj[j].measurement_unit;
                        }                       
                    }
                }
                else{
                    if (measurement === indicatorsObj[i].measurement_unit) {
                        html += '<li onclick="findIndicator($(this).text())">'+ indicatorsObj[i].name +'</li>';
                    }
                }
            }
            else{
                html += '<li onclick="findIndicator($(this).text())">'+ indicatorsObj[i].name +'</li>';
            }            
        }            
    }
    $("#resultIndicator").append(html);
});
//добавляем индикатор и очищаем список
function findIndicator(text){
    $("#searchIndicator").val(text);
    $("#resultIndicator").html('');
}
//удаляем индикатор с массива и со страницы
function removeIndicator(elem){
    for (var i = 0; i < indicatorsAddArr.length; i++){
        if (indicatorsAddArr[i] == elem.siblings('.indicator-name').text()) {
            indicatorsAddArr.splice(i, 1);
        }
    }
    elem.parent().remove();
    $("#indicatorGroup > tr > th").each(function(k,elem) {
        $(elem).text(k+1);
    });
    measurement = '';
}
//добавляем индикатор на страницу
$("#addIndicator").click(function() {
    if (indicatorsAddArr.length < 4) {
        if ((indicatorsAddArr.indexOf($("#searchIndicator").val()) === -1) && (indicatorsArr.indexOf($("#searchIndicator").val()) + 1)) {
            indicatorsAddArr.push($("#searchIndicator").val());
            $("#indicatorGroup").append(`
                <tr>
                <th scope="row" class="indicator-index">`+ ($("#indicatorGroup > tr").length + 1) +`</th>
                <td><i onclick="settingsIndicator($(this))" class="fa fa-wrench" title="Позволяет объединять данные"></i></td>
                <td class="indicator-name">`+ $("#searchIndicator").val() +`</td>
                <td onclick="removeIndicator($(this))"><i class="fa fa-window-close-o"></i></td>         
                </tr>`
                );
        }
    }
    else{
        alert("Лимит 4 индикатора !");
    }    
});


/*
* Агрегация индикаторов
*/

//настраиваем частоту данных индикатора
function settingsIndicator(elem) {
    if (elem.siblings(".wrench").length > 0) {elem.siblings(".wrench").remove(); return 0;}
    var name = elem.parent().siblings('.indicator-name').text();
    console.log(name);
    elem.after(`
        <select class="wrench">
            <option value="0">агрегировать данные</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="month-mean">месяц(средний)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="quarter-mean">квартал(средний)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="year-mean">год(средний)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="month-min">месяц(минимальный)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="quarter-min">квартал(минимальный)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="year-min">год(минимальный)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="month-max">месяц(максимальный)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="quarter-max">квартал(максимальный)</option>
            <option onclick="aggregationIndicator($(this),'`+name+`')" value="year-max">год(максимальный)</option>
        </select>
        `);
}

function aggregationIndicator(elem,name) {
    alert(elem.val()+ ' ' + name);
}


/*
* Построение графика
*/

var monthsArr = JSON.parse(months);
var dataObj = JSON.parse(data);
var fullChart = false;
var backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(76, 47, 39, 0.2)', 'rgba(33, 255, 33, 0.2)', 'rgba(33, 33, 255, 0.2)'];
var borderColor = ['rgba(255, 99, 132, 1)', 'rgba(76, 47, 39, 1)', 'rgba(33, 255, 33, 1)', 'rgba(33, 33, 255, 1)'];

$("#makeChart").click(function() {

    var ctx = undefined;
    var myLineChart = undefined;
    var dataChartObj = [];
    var datasets = [];
    var labels = [];

    var fromMonth = $("#fromMonth").val();
    var fromYear = $("#fromYear").val();    
    var untilMonth = $("#untilMonth").val();
    var untilYear = $("#untilYear").val();
    var fromDate = new Date(fromYear, fromMonth, 1 );
    var untilDate = new Date(untilYear, untilMonth, 1);
    var daysPeriod = Math.ceil((untilDate.getTime() - fromDate.getTime()) / (1000 * 3600 * 24));
    var yearsPeriod = ' ' + fromYear + 'г. - ' + untilYear + 'г.';

    if (daysPeriod < 28) {
        alert("Выберите корректный период (больше месяца) !");
        return 0;
    }  
    
    
    //Если есть индикаторы
    if (indicatorsAddArr.length > 0){
        //Cоздаем объект данных согласно индикаторам
        for (var i = 0; i < indicatorsAddArr.length; i++){
            for (var j = 0; j < indicatorsObj.length; j++){
                if (indicatorsAddArr[i] === indicatorsObj[j].name) {
                    dataChartObj.push(
                    { 
                        'id':indicatorsObj[j].id,
                        'frequency':indicatorsObj[j].frequency,
                        'name':indicatorsObj[j].name,
                        'data':dataObj[indicatorsObj[j].id]
                    }
                    );
                }
            }    
        }
        
        //Cоздаем объект с данными для каждого индикатора
        
        hasFromYear = false;
        hasUntilYear = false;
        //проверяем наличие данных согласно периоду
        for (var i = 0; i < dataChartObj[0].data.length; i++){
            if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == fromYear){
                hasFromYear = true;
                break;
            }
        }
        for (var i = 0; i < dataChartObj[0].data.length; i++){
            if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == untilYear){
                hasUntilYear = true;
                break;  
            }
        }       
        if (!hasFromYear || !hasUntilYear) {
            alert("Нет данных этого индикатора для этого периода !");
            return 0;
        } 
        
        //создаем горизонтальную шкалу согласно величине периода
        if (daysPeriod < 367) {
            for (var i = 0; i < dataChartObj[0].data.length; i++){
                if (fromDate.getTime()<=Date.parse(dataChartObj[0].data[i].date) && Date.parse(dataChartObj[0].data[i].date)<=untilDate.getTime()+1000*3600*3){
                    labels.push(monthsArr[new Date(dataChartObj[0].data[i].date).getMonth()]);
                }               
            }
        }
        else if (daysPeriod < 732){
            for (var i = 0; i < dataChartObj[0].data.length; i++){
                if (new Date(dataChartObj[0].data[i].date).getMonth() < 9) {
                    if (fromDate.getTime()<=Date.parse(dataChartObj[0].data[i].date) && Date.parse(dataChartObj[0].data[i].date)<=untilDate.getTime()+1000*3600*3){
                        labels.push(
                            '0'+(new Date(dataChartObj[0].data[i].date).getMonth()+1)+'.'
                            +(new Date(dataChartObj[0].data[i].date).getFullYear()+'').substr(2,2)
                            );
                    }
                }
                else{
                    if (fromDate.getTime()<=Date.parse(dataChartObj[0].data[i].date) && Date.parse(dataChartObj[0].data[i].date)<=untilDate.getTime()+1000*3600*3){
                        labels.push(
                            (new Date(dataChartObj[0].data[i].date).getMonth()+1)+'.'
                            +(new Date(dataChartObj[0].data[i].date).getFullYear()+'').substr(2,2)
                            );
                    }
                }
            }
        }
        else {
            for (var i = 0; i < dataChartObj[0].data.length; i++){
                if (fromDate.getTime()<=Date.parse(dataChartObj[0].data[i].date) && Date.parse(dataChartObj[0].data[i].date)<=untilDate.getTime()+1000*3600*3){
                    labels.push(new Date(dataChartObj[0].data[i].date).getFullYear());
                }
            }
        }  

        //создаем объект datasets согласно данным
        for (var i = 0; i < dataChartObj.length; i++){
            var data = [];
            
            for (var j = 0; j < dataChartObj[i].data.length; j++){
                data.push(dataChartObj[i].data[j].value);                
            }
            
            datasets.push(
            {
                label: dataChartObj[i].name + yearsPeriod,//название линии в графике
                data: data,//вертикальная шкала данных
                backgroundColor: [backgroundColor[i]],//цвет заливки площади под линией в графике
                borderColor: [borderColor[i]],//цвет линии в графике
                borderWidth: 1,//толщина линии
                pointRadius: 0,//наличие точек на линии
            });
        }

        //рисуем график с помощью Chart.js
        ctx = document.getElementById("myChart").getContext('2d');
        myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets,                       
            },
            options: {
                animation: {
                duration: 0, // general animation time
            },
            hover: {
                animationDuration: 0, // duration of animations when hovering an item
            },
                responsiveAnimationDuration: 0, // animation duration after a resize
            }
        });

        fullChart = true;
    }
    else{
        alert('Выберите индикатор !');
    }

});


