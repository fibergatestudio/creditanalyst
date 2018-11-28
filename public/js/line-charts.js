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
    if ((indicatorsAddArr.indexOf($("#searchIndicator").val()) === -1) && (indicatorsArr.indexOf($("#searchIndicator").val()) + 1)) {
        indicatorsAddArr.push($("#searchIndicator").val());
        $("#indicatorGroup").append(`
            <tr>
            <th scope="row">`+ ($("#indicatorGroup > tr").length + 1) +`</th>
            <td class="indicator-name">`+ $("#searchIndicator").val() +`</td>
            <td onclick="removeIndicator($(this))"><i class="fa fa-window-close-o"></i></td>         
            </tr>`
            );
    }    
});


/*
* Построение графика
*/

var dataObj = JSON.parse(data);
var fullChart = false;

var backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(99, 255, 132, 0.2)'];
var borderColor = ['rgba(255,99,132,1)', 'rgba(99,255,132,1)'];

$("#makeChart").click(function() {

    var ctx = undefined;
    var myLineChart = undefined;
    var dataChartObj = [];

    var datasets = [];
    var labels = [];

   /* var fromMonth = $("#fromMonth").val();
    var fromYear = $("#fromYear").val();
    var untilMonth = $("#untilMonth").val();
    var untilYear = $("#untilYear").val();
    var fromDate = new Date(fromYear, fromMonth, 1 );
    var untilDate = new Date(untilYear, untilMonth, 1);
    var daysDif = Math.ceil(Math.abs(untilDate.getTime() - fromDate.getTime()) / (1000 * 3600 * 24));*/
    
    if (indicatorsAddArr.length > 0){
        //создаем объект данных согласно индикаторам
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

        //создаем объект с данными для каждого индикатора
        for (var i = 0; i < dataChartObj[0].data.length; i++){
            labels.push(dataChartObj[0].data[i].date);
        }

        for (var i = 0; i < dataChartObj.length; i++){
            var data = [];
            
            for (var j = 0; j < dataChartObj[i].data.length; j++){
                data.push(dataChartObj[i].data[j].value);                
            }
            
            datasets.push(
            {
                label: dataChartObj[i].name,
                data: data,
                backgroundColor: [backgroundColor[i]],
                borderColor: [borderColor[i]],
                borderWidth: 1,
                pointRadius: 0,
            });
        }

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
        alert('Выберите индикатор!');
    }

});


