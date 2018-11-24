    var ctx = document.getElementById("myChart").getContext('2d');
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['January','','','','','February','','','','','March','','','','','April','','','','','May','','','','','June','','','','','July','','','','','August','','','','','September','','','','','October','','','','','November','','','','','December','','','',''],                       
            datasets: [{
                label: 'line',
                data:[15,5,25,20,10,15,25,20,10,20,10,15,15,5,25,20,10,15,25,20,10,20,10,15,5,25,20,10,15,25,20,10,20,10,15,15,5,25,20,10,15,25,20,10,20,10,15,15,25,20,10,20,10,15,5,25,20,10,15,25,20,10,20,10,15,15,5,25,20,10,15,25,20,10,20,10,15],
                backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                'rgba(255,99,132,1)'
                ],
                borderWidth: 1,
                pointRadius: 0,
            },
            {
                label: 'line2',
                data:[10,15,25,15,5,25,20,10,15,25,20,10,20,10,15,15,5,25,20,10,15,25,20,10,20,10,15,15,25,20,10,20,10,15,5,25,20,10,15,25,20,10,20,10,15,20,10,20,10,15,15,5,25,20,10,15,25,20,10,20,10,15,5,25,20,10,15,25,20,10,20,10,15,15,5,25,20,],
                backgroundColor: [
                'rgba(99, 255, 132, 0.2)'
                ],
                borderColor: [
                'rgba(99,255,132,1)'
                ],
                borderWidth: 1,
                pointRadius: 0,
            },]
        },
        options: {
            /*scales: {
                xAxes: [{
                    ticks: {
                        min: 'January',
                        max: 'December'
                    }
                }]
            },*/
            animation: {
            duration: 0, // general animation time
        },
        hover: {
            animationDuration: 0, // duration of animations when hovering an item
        },
        responsiveAnimationDuration: 0, // animation duration after a resize
    }
});
