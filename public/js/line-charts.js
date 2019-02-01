/*
* Добавление индикатора
*/

var indicatorsObj = JSON.parse(indicators);
var dataObj = JSON.parse(data);
var dataTemp = {};
var geography = '';
var indicatorsAddArr = [];
var measurement = '';
var strHref = document.location.href;

//Сортируем объект по полю value
function compareValue(regionA, regionB) {
  return regionA.value - regionB.value;
}      

//если мы находимся на странице построения линейного графика
if(!(strHref.indexOf('charts-map') + 1)){
    //Перебираем данные для составления объекта данных для графика под одну конкретную, 
    //первую попавшуюся область, если она задана, а не равна '0000000000'
    for (var i = 0; i < indicatorsObj.length; i++){
        dataTemp[indicatorsObj[i].id] = [];
        for (var j = 0; j < dataObj.length; j++) {
            if (dataObj[j].indicator_id === indicatorsObj[i].id) {
                if (dataObj[j].geography !== '0000000000') {
                    if (geography !== '') {
                        if (dataObj[j].geography === geography) {
                            dataTemp[indicatorsObj[i].id].push({
                                date : dataObj[j].date,
                                value : dataObj[j].value
                            });
                        } 
                    }
                    else{
                        geography = dataObj[j].geography;
                        dataTemp[indicatorsObj[i].id].push({
                            date : dataObj[j].date,
                            value : dataObj[j].value
                        });
                    }               
                }
                else{
                    dataTemp[indicatorsObj[i].id].push({
                        date : dataObj[j].date,
                        value : dataObj[j].value
                    });
                }          
            }                               
        }
        geography = '';
    }

    dataObj = dataTemp;
    var indicatorsArr = JSON.parse(indicatorsName);
}
else{
    //если мы находимся на странице построения карты
    //Перебираем данные для составления объекта данных для графика под одну 
    //последнюю дату для каждой области
    var indicatorsObjTemp = [];
    var indicatorsArr = [];
    var koatuuArr = [];

    //создаем объект доступных индикаторов
    for (var i = 0; i < indicatorsObj.length; i++){
        if (indicatorsObj[i].geography_unit == 'R') {
            indicatorsObjTemp.push(indicatorsObj[i]);
            indicatorsArr.push(indicatorsObj[i].name);
        }
        else if (indicatorsObj[i].geography_unit == 'D') {
            //перебираем данные с детализацией по районам, берем первый попавшийся район в области,его данные делаем областными, 
            //остальные данные этой области удаляем, т.е. приводим детализацию к областной
            var j = dataObj.length - 1;
            var geographyArr = [];
            while (j >= 0) {
                if (dataObj[j].indicator_id === indicatorsObj[i].id) {                   
                    if (dataObj[j].geography.substr(0, 2) !== geography.substr(0, 2)) {
                        geography = dataObj[j].geography.substr(0, 2)+'00000000';
                        if (geographyArr.indexOf(geography) === -1) {                           
                            dataObj[j].geography = geography;
                            geographyArr.push(geography);
                        }
                        else{
                            dataObj.splice(j, 1);
                        }
                    }
                    else{
                        dataObj.splice(j, 1);
                    }                             
                } 
                j--;                             
            }
            
            indicatorsObjTemp.push(indicatorsObj[i]);
            indicatorsArr.push(indicatorsObj[i].name);
        }       
    }
    indicatorsObj = indicatorsObjTemp;
    
    //создаем массив кодов областей
    for (var i = 0; i < koatuu.length; i++) {
        koatuuArr.push(koatuu[i].unique_koatuu_id);
    }
    
    //создаем новый объект
    for (var i = 0; i < indicatorsObj.length; i++){
        dataTemp[indicatorsObj[i].id] = [];
        for (var k = 0; k < koatuuArr.length; k++) {
            for (var j = dataObj.length - 1; j >= 0; j--) {
                if (dataObj[j].indicator_id === indicatorsObj[i].id){
                    if (koatuuArr[k] === dataObj[j].geography) {
                        dataTemp[indicatorsObj[i].id].push({
                            date : dataObj[j].date,
                            geography : dataObj[j].geography,
                            value : dataObj[j].value
                        });
                        break;
                    }
                }
            }
        }
    }

    dataObj = dataTemp;
    
    var dataTemp = {};

    for (key in dataObj) {
        if (dataObj[key].length > 0) {
            dataTemp[key] = dataObj[key].sort(compareValue);
        }
    }

    dataObj = dataTemp;
}


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
    $("#indicatorGroup > tr > th.indicator-index").each(function(k,elem) {
        $(elem).text('0'+(k+1));
    });
    measurement = '';

    //картинки для ротации индикаторов
    $("#indicatorGroup tr th:first-child").html('<img onclick="rotateIndicator($(this))" class="img-rotate" title="Переместить" src="/mercurial/images/icons/28.png" style="cursor: pointer;">');
    $("#indicatorGroup tr:first-child th:first-child").html('<img onclick="rotateIndicator($(this))" title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;">');
    $("#indicatorGroup tr:last-child th:first-child").html('<img onclick="rotateIndicator($(this))" title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;transform: rotate(180deg);">');  
}

//добавляем индикатор на страницу при клике
$("#addIndicator").click(function() {
    if (indicatorsAddArr.length < 4) {
        //если мы находимся на странице построения линейного графика
        if(!(strHref.indexOf('charts-map') + 1)){
            if ((indicatorsAddArr.indexOf($("#searchIndicator").val()) === -1) && (indicatorsArr.indexOf($("#searchIndicator").val()) + 1)) {
                indicatorsAddArr.push($("#searchIndicator").val());
                $("#indicatorGroup").append(`
                    <tr>
                    <th></th>
                    <th scope="row" class="indicator-index">`+ `0`+($("#indicatorGroup > tr").length + 1)+`</th>                           
                    <td><i onclick="settingsIndicator($(this))" class="fa fa-wrench" title="Позволяет объединять данные"></i></td>
                    <td class="indicator-name">`+ $("#searchIndicator").val() +`</td>
                    <td onclick="removeIndicator($(this))">
                    <img  title="Удалить" src="/mercurial/images/icon-delet-red.png" style="cursor: pointer;"></td>         
                    </tr>`
                    );
            }

                //корректируем под имеющиеся данные блок периода графика
                var start = 0;
                var finish = 0;
                var html = '';
                for (var i = 0; i < indicatorsObj.length; i++){
                    if (indicatorsObj[i].name === $("#searchIndicator").val()) {
                        start = new Date(dataObj[indicatorsObj[i].id][0].date).getFullYear();
                        finish = new Date(dataObj[indicatorsObj[i].id][dataObj[indicatorsObj[i].id].length - 1].date).getFullYear();
                    }
                }
                for (var i = start; i <= finish; i++) {
                    html += `<option value="`+i+`">`+i+`</option>`;
                }
                $("#fromYear").html(html);
                $("#untilYear").html(html);
            }
            else{
                //если мы находимся на странице построения карты
                if ((indicatorsAddArr.indexOf($("#searchIndicator").val()) === -1) && (indicatorsArr.indexOf($("#searchIndicator").val()) + 1)) {
                    indicatorsAddArr.push($("#searchIndicator").val());
                    $("#indicatorGroup").append(`
                        <tr>
                        <th></th>
                        <th scope="row" class="indicator-index">`+ `0`+($("#indicatorGroup > tr").length + 1)+`</th> 
                        <td class="indicator-name">`+ $("#searchIndicator").val() +`</td>
                        <td onclick="removeIndicator($(this))">
                        <img  title="Удалить" src="/mercurial/images/icon-delet-red.png" style="cursor: pointer;"></td>         
                        </tr>`
                        );
                }
            }
        }
        else{
            alert("Лимит 4 индикатора !");
        }

    //картинки для ротации индикаторов
    $("#indicatorGroup tr th:first-child").html('<img onclick="rotateIndicator($(this))" class="img-rotate" title="Переместить" src="/mercurial/images/icons/28.png" style="cursor: pointer;">');
    $("#indicatorGroup tr:first-child th:first-child").html('<img onclick="rotateIndicator($(this))" title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;">');
    $("#indicatorGroup tr:last-child th:first-child").html('<img onclick="rotateIndicator($(this))" title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;transform: rotate(180deg);">');    
});


//добавляем индикатор на страницу если он пришел с $_GET
var indicatorNameGet = '';
if (indicatorIdGet > 0) {
    for (var i = 0; i < indicatorsObj.length; i++) {
        if (indicatorsObj[i].id == indicatorIdGet){
            indicatorNameGet = indicatorsObj[i].name;
            break;
        }
    }
    
    if (indicatorsArr.indexOf(indicatorNameGet) + 1) {
        indicatorsAddArr.push(indicatorNameGet);
        $("#indicatorGroup").append(`
            <tr>
            <th></th>
            <th scope="row" class="indicator-index">`+ `0`+($("#indicatorGroup > tr").length + 1)+`</th>                           
            <td><i onclick="settingsIndicator($(this))" class="fa fa-wrench" title="Позволяет объединять данные"></i></td>
            <td class="indicator-name">`+ indicatorNameGet +`</td>
            <td onclick="removeIndicator($(this))">
            <img  title="Удалить" src="/mercurial/images/icon-delet-red.png" style="cursor: pointer;"></td>         
            </tr>`
            );

            //корректируем под имеющиеся данные блок периода графика
            var start = 0;
            var finish = 0;
            var html = '';
            for (var i = 0; i < indicatorsObj.length; i++){
                if (indicatorsObj[i].name === indicatorNameGet) {
                    start = new Date(dataObj[indicatorsObj[i].id][0].date).getFullYear();
                    finish = new Date(dataObj[indicatorsObj[i].id][dataObj[indicatorsObj[i].id].length - 1].date).getFullYear();
                }
            }
            for (var i = start; i <= finish; i++) {
                html += `<option value="`+i+`">`+i+`</option>`;
            }
            $("#fromYear").html(html);
            $("#untilYear").html(html);
        }

    //картинки для ротации индикаторов
    $("#indicatorGroup tr th:first-child").html('<img onclick="rotateIndicator($(this))" class="img-rotate" title="Переместить" src="/mercurial/images/icons/28.png" style="cursor: pointer;">');
    $("#indicatorGroup tr:first-child th:first-child").html('<img onclick="rotateIndicator($(this))"  title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;">');
    $("#indicatorGroup tr:last-child th:first-child").html('<img onclick="rotateIndicator($(this))" title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;transform: rotate(180deg);">');   
}


/*
* Ротация индикаторов
*/

function rotateIndicator(elem){
    if ($("#indicatorGroup tr").length > 1) {
        indicatorsAddArr = [];
        var rotateElem = elem.parent().parent().html();
        var nextElem = elem.parent().parent().next().html();
        var prevElem = elem.parent().parent().prev().html();
        //меняем элементы местами
        $("#indicatorGroup tr").each(function(k,el) {
            if($(el).html() === rotateElem && k === ($("#indicatorGroup tr").length - 1)){
                elem.parent().parent().prev().html(rotateElem);
                elem.parent().parent().html(prevElem);
            }
            else{               
                elem.parent().parent().next().html(rotateElem);
                elem.parent().parent().html(nextElem);
            }
        });
        //перезаписываем номера индикаторов
        $("#indicatorGroup > tr > th.indicator-index").each(function(k,elem) {
            $(elem).text('0'+(k+1));
        });
        measurement = '';
        //картинки для ротации индикаторов
        $("#indicatorGroup tr th:first-child").html('<img onclick="rotateIndicator($(this))" class="img-rotate" title="Переместить" src="/mercurial/images/icons/28.png" style="cursor: pointer;">');
        $("#indicatorGroup tr:first-child th:first-child").html('<img onclick="rotateIndicator($(this))" title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;">');
        $("#indicatorGroup tr:last-child th:first-child").html('<img onclick="rotateIndicator($(this))" title="Переместить" src="/mercurial/images/icons/27.png" style="cursor: pointer;transform: rotate(180deg);">');
        //перезаписываем массив индикаторов
        $("#indicatorGroup tr td.indicator-name").each(function(k,elem) {
            indicatorsAddArr.push($(elem).text());
        });
    }     
}


/*
* Агрегация индикаторов
*/

//настраиваем частоту данных индикатора
function settingsIndicator(elem) {
    if (elem.siblings(".wrench").length > 0) {elem.siblings(".wrench").remove(); return 0;}
    var name = elem.parent().siblings('.indicator-name').text();
    elem.after(`
        <select class="wrench">
        <option value="0">агрегировать данные</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="M-mean">месяц(средний)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="Q-mean">квартал(средний)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="Y-mean">год(средний)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="M-min">месяц(минимальный)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="Q-min">квартал(минимальный)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="Y-min">год(минимальный)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="M-max">месяц(максимальный)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="Q-max">квартал(максимальный)</option>
        <option onclick="aggregationIndicator($(this),'`+name+`')" value="Y-max">год(максимальный)</option>
        </select>
        `);
}

//выполняем объединение данных согласно выбранной частоте
function aggregationIndicator(elem,name) {
    var frequencyArr = {'M':1, 'Q':2, 'Y':3};
    for (var i = 0; i < indicatorsObj.length; i++){
        if (indicatorsObj[i].name === name) {
            if (indicatorsObj[i].frequency === elem.val().split('-')[0] || frequencyArr[indicatorsObj[i].frequency] > frequencyArr[elem.val().split('-')[0]]) {
                alert("Подберите корректную частоту данных, или обновите страницу !");
                return 0;
            }
            else {
                if (confirm("Вы действительно хотите агрегировать эти данные ?")) {
                    var data = dataObj[indicatorsObj[i].id];
                    var startMonth = new Date(data[0].date).getMonth();
                    var startYear = new Date(data[0].date).getFullYear();
                    var startDate = data[0].date;
                    var total = 0;
                    var mean = 0;
                    var min = parseFloat(data[0].value);
                    var max = parseFloat(data[0].value);
                    var newData = [];
                    var length = 0;
                    
                    //месяц
                    if (elem.val().split('-')[0] === 'M') {
                        if (elem.val().split('-')[1] === 'mean') {                           
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getMonth() == startMonth) {
                                    total += parseFloat(data[j].value);
                                    length++;
                                }
                                else{
                                    mean = Math.ceil(total/length*100)/100;                                    
                                    newData.push({
                                        date : startDate,
                                        value : mean
                                    });
                                    startMonth++;
                                    if (startMonth < 12) {
                                        startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');
                                    }
                                    else{
                                        startYear++;
                                        startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                        startMonth = 0;
                                    }
                                    total = 0;
                                    length = 0;                                    
                                }
                            }
                            mean = Math.ceil(total/length*100)/100;
                            newData.push({
                                date : startDate,
                                value : mean
                            });                            
                        }
                        else if (elem.val().split('-')[1] === 'min') {
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getMonth() == startMonth) {
                                    if (min > parseFloat(data[j].value)) {
                                        min = parseFloat(data[j].value);
                                    }
                                }
                                else{                                  
                                    newData.push({
                                        date : startDate,
                                        value : min
                                    });
                                    startMonth++;
                                    if (startMonth < 12) {
                                        startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');
                                    }
                                    else{
                                        startYear++;
                                        startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                        startMonth = 0;
                                    } 
                                    min = parseFloat(data[j].value);                            
                                }
                            }
                            newData.push({
                                date : startDate,
                                value : min
                            });
                        }
                        else if (elem.val().split('-')[1] === 'max') {
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getMonth() == startMonth) {
                                    if (max < parseFloat(data[j].value)) {
                                        max = parseFloat(data[j].value);
                                    }
                                }
                                else{                                  
                                    newData.push({
                                        date : startDate,
                                        value : max
                                    });
                                    startMonth++;
                                    if (startMonth < 12) {
                                        startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');
                                    }
                                    else{
                                        startYear++;
                                        startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                        startMonth = 0;
                                    }
                                    max = parseFloat(data[j].value);                             
                                }
                            }
                            newData.push({
                                date : startDate,
                                value : max
                            });
                        }
                    }
                    
                    //квартал
                    if (elem.val().split('-')[0] === 'Q') {
                        if (elem.val().split('-')[1] === 'mean') {                           
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getMonth() == 0 && startMonth == 9) {
                                    startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');
                                    mean = Math.ceil(total/length*100)/100;                                    
                                    newData.push({
                                        date : startDate,
                                        value : mean
                                    });                                   
                                    total = 0;
                                    length = 0;
                                    startYear++;
                                    startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                    startMonth = 0;
                                }
                                if (new Date(data[j].date).getMonth() < startMonth + 3) {
                                    total += parseFloat(data[j].value);
                                    length++;
                                }
                                else{
                                    mean = Math.ceil(total/length*100)/100;                                    
                                    newData.push({
                                        date : startDate,
                                        value : mean
                                    });
                                    startMonth += 3;
                                    startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');
                                    total = 0;
                                    length = 0;                                    
                                }
                            }
                            mean = Math.ceil(total/length*100)/100;
                            newData.push({
                                date : startDate,
                                value : mean
                            });                            
                        }
                        else if (elem.val().split('-')[1] === 'min') {
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getMonth() == 0 && startMonth == 9) {
                                    startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');                                   
                                    newData.push({
                                        date : startDate,
                                        value : min
                                    });
                                    min = parseFloat(data[j].value);                                   
                                    startYear++;
                                    startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                    startMonth = 0;
                                }
                                if (new Date(data[j].date).getMonth() < startMonth + 3) {
                                    if (min > parseFloat(data[j].value)) {
                                        min = parseFloat(data[j].value);
                                    }
                                }
                                else{                                  
                                    newData.push({
                                        date : startDate,
                                        value : min
                                    });
                                    startMonth += 3;
                                    startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');
                                    min = parseFloat(data[j].value);
                                }
                            }
                            newData.push({
                                date : startDate,
                                value : min
                            });
                        }
                        else if (elem.val().split('-')[1] === 'max') {
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getMonth() == 0 && startMonth == 9) {
                                    startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');                                   
                                    newData.push({
                                        date : startDate,
                                        value : max
                                    });
                                    max = parseFloat(data[j].value);                                   
                                    startYear++;
                                    startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                    startMonth = 0;
                                }
                                if (new Date(data[j].date).getMonth() < startMonth + 3) {
                                    if (max < parseFloat(data[j].value)) {
                                        max = parseFloat(data[j].value);
                                    }
                                }
                                else{                                  
                                    newData.push({
                                        date : startDate,
                                        value : max
                                    });
                                    startMonth += 3;
                                    startDate = startDate.replace(/-[0-9]+-/g, '-'+(startMonth+1)+'-');
                                    max = parseFloat(data[j].value);                          
                                }
                            }
                            newData.push({
                                date : startDate,
                                value : max
                            });
                        }
                    }

                    //год
                    if (elem.val().split('-')[0] === 'Y') {
                        if (elem.val().split('-')[1] === 'mean') {                           
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getFullYear() == startYear) {
                                    total += parseFloat(data[j].value);
                                    length++;
                                }
                                else{
                                    mean = Math.ceil(total/length*100)/100;                                    
                                    newData.push({
                                        date : startDate,
                                        value : mean
                                    });
                                    startYear++;
                                    startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                    total = 0;
                                    length = 0;                                    
                                }
                            }
                            mean = Math.ceil(total/length*100)/100;
                            newData.push({
                                date : startDate,
                                value : mean
                            });                            
                        }
                        else if (elem.val().split('-')[1] === 'min') {
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getFullYear() == startYear) {
                                    if (min > parseFloat(data[j].value)) {
                                        min = parseFloat(data[j].value);
                                    }
                                }
                                else{                                  
                                    newData.push({
                                        date : startDate,
                                        value : min
                                    });
                                    startYear++;
                                    startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                    min = parseFloat(data[j].value);                            
                                }
                            }
                            newData.push({
                                date : startDate,
                                value : min
                            });
                        }
                        else if (elem.val().split('-')[1] === 'max') {
                            for (var j = 0; j < data.length; j++) {
                                if (new Date(data[j].date).getFullYear() == startYear) {
                                    if (max < parseFloat(data[j].value)) {
                                        max = parseFloat(data[j].value);
                                    }
                                }
                                else{                                  
                                    newData.push({
                                        date : startDate,
                                        value : max
                                    });
                                    startYear++;
                                    startDate = startDate.replace(/[0-9]+-[0-9]+-/g, startYear+'-1-');
                                    max = parseFloat(data[j].value);                            
                                }
                            }
                            newData.push({
                                date : startDate,
                                value : max
                            });
                        }
                    }

                    indicatorsObj[i].frequency = elem.val().split('-')[0];
                    dataObj[indicatorsObj[i].id] = newData;
                }
                else{
                    return 0;
                }
            }           
        }
    }
}


/*
* Построение графика
*/

var monthsArr = JSON.parse(months);
var fullChart = false;
var backgroundColor = ['rgba(255, 99, 132, 0.2)', 'rgba(76, 47, 39, 0.2)', 'rgba(33, 255, 33, 0.2)', 'rgba(33, 33, 255, 0.2)'];
var borderColor = ['rgba(255, 99, 132, 1)', 'rgba(76, 47, 39, 1)', 'rgba(33, 255, 33, 1)', 'rgba(33, 33, 255, 1)'];


//Построение графика если индикатор пришел с $_GET
if (indicatorIdGet > 0){

    var frequency = '';
    var ctx = undefined;
    var myLineChart = undefined;
    var dataChartObj = [];
    var datasets = [];
    var labels = [];
    
    var fromYear = new Date(fromGet).getFullYear();
    var untilYear = new Date(toGet).getFullYear();
    var fromDate = new Date(fromGet);
    var untilDate = new Date(toGet);
    var daysPeriod = Math.ceil((untilDate.getTime() - fromDate.getTime()) / (1000 * 3600 * 24));
    var yearsPeriod = ' ' + fromYear + 'г. - ' + untilYear + 'г.';

    if (daysPeriod < 28) {
        alert("Выберите корректный период (больше месяца) !");
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
            if (dataChartObj[0].frequency === 'D'){
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == fromYear && new Date(dataChartObj[0].data[i].date).getMonth() == fromMonth){
                    hasFromYear = true;
                    break;
                } 
            }
            else{
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == fromYear){
                    hasFromYear = true;
                    break;
                }
            }
        }
        for (var i = 0; i < dataChartObj[0].data.length; i++){
            if (dataChartObj[0].frequency === 'D') {
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == untilYear && new Date(dataChartObj[0].data[i].date).getMonth() == untilMonth - 1){
                    hasUntilYear = true;
                    break;  
                }
            }
            else{
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == untilYear){
                    hasUntilYear = true;
                    break;  
                }
            }
        }       
        if (!hasFromYear || !hasUntilYear) {
            alert("Нет данных этого индикатора для этого периода !");
            document.location.href = rootSite+"/admin/statistics-analysis/charts";
        } 
        
        //создаем горизонтальную шкалу согласно величине периода
        if (daysPeriod < 58) {
            for (var i = 0; i < dataChartObj[0].data.length; i++){
                if (fromDate.getTime()<=Date.parse(dataChartObj[0].data[i].date) && Date.parse(dataChartObj[0].data[i].date)<=untilDate.getTime()+1000*3600*3){
                    labels.push((new Date(dataChartObj[0].data[i].date).toLocaleString()).slice(0, -14));
                }               
            }
        }
        else if (daysPeriod < 367) {
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
            
            //создаем вертикальную шкалу согласно величине периода
            for (var j = 0; j < dataChartObj[i].data.length; j++){
                if (fromDate.getTime()<=Date.parse(dataChartObj[i].data[j].date) && Date.parse(dataChartObj[i].data[j].date)<=untilDate.getTime()+1000*3600*3)
                {
                    data.push(dataChartObj[i].data[j].value); 
                }               
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
                labels: labels,//горизонтальная шкала данных
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
}


//Построение графика при клике
$("#makeChart").click(function() {

    var frequency = '';
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

        //Проверяем частоту данных
        for (var i = 0; i < dataChartObj.length; i++) {
            if (frequency === '') {
                frequency = dataChartObj[i].frequency;
            }
            else if(frequency !== dataChartObj[i].frequency){
                alert("Настройте одинаковую частоту индикаторов !");
                return 0;
            }            
        }
        
        //Cоздаем объект с данными для каждого индикатора

        hasFromYear = false;
        hasUntilYear = false;
        
        //проверяем наличие данных согласно периоду
        for (var i = 0; i < dataChartObj[0].data.length; i++){
            if (dataChartObj[0].frequency === 'D'){
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == fromYear && new Date(dataChartObj[0].data[i].date).getMonth() == fromMonth){
                    hasFromYear = true;
                    break;
                } 
            }
            else{
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == fromYear){
                    hasFromYear = true;
                    break;
                }
            }
        }
        for (var i = 0; i < dataChartObj[0].data.length; i++){
            if (dataChartObj[0].frequency === 'D') {
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == untilYear && new Date(dataChartObj[0].data[i].date).getMonth() == untilMonth - 1){
                    hasUntilYear = true;
                    break;  
                }
            }
            else{
                if((new Date(dataChartObj[0].data[i].date).getFullYear()+'') == untilYear){
                    hasUntilYear = true;
                    break;  
                }
            }
        }       
        if (!hasFromYear || !hasUntilYear) {
            alert("Нет данных этого индикатора для этого периода !");
            return 0;
        } 
        
        //создаем горизонтальную шкалу согласно величине периода
        if (daysPeriod < 58) {
            for (var i = 0; i < dataChartObj[0].data.length; i++){
                if (fromDate.getTime()<=Date.parse(dataChartObj[0].data[i].date) && Date.parse(dataChartObj[0].data[i].date)<=untilDate.getTime()+1000*3600*3){
                    labels.push((new Date(dataChartObj[0].data[i].date).toLocaleString()).slice(0, -14));
                }               
            }
        }
        else if (daysPeriod < 367) {
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
            
            //создаем вертикальную шкалу согласно величине периода
            for (var j = 0; j < dataChartObj[i].data.length; j++){
                if (fromDate.getTime()<=Date.parse(dataChartObj[i].data[j].date) && Date.parse(dataChartObj[i].data[j].date)<=untilDate.getTime()+1000*3600*3)
                {
                    data.push(dataChartObj[i].data[j].value); 
                }               
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
                labels: labels,//горизонтальная шкала данных
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


