let hoistedValue = 0;

function updateChart(){
    async function fetchData(){
        const url = 'http://localhost/SLEFML/js/data.json'
        const response = await fetch(url);
        const datapoints = await response.json();
        console.log(datapoints)
        return datapoints;
    };
    fetchData().then(datpoints =>{
        const date = datpoints.map((date ,index)=>{
            return date.Date;
        });
        //console.log(month)
        const value = datpoints.map((value ,index)=>{
            return value.TrueMegaWatt;
        });

        const value1 = datpoints.map((value1 ,index)=>{
            return value1.PredictedMeagWatt;
        });

        if(myChart.data.labels.length>100){
            myChart.data.labels.shift();
            myChart.data.datasets[0].data.shift();
            myChart.data.datasets[1].data.shift();
        }
        console.log(value)
        //myChart.data.labels =month;
        //myChart.data.datasets[0].data =value;
        myChart.data.labels.push(date[hoistedValue])
        myChart.data.datasets[0].data.push(value[hoistedValue])
        myChart.data.datasets[1].data.push(value1[hoistedValue])
        myChart.update();
        //console.log('show')
        hoistedValue++;
    })

   
};
setInterval(updateChart,700)
const ctx = document.getElementById('canvas').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [],
        datasets: [{
            label: '# Actual',
            data: [],
            backgroundColor:'transparent',
            borderColor:'green',
            borderWidth: 4
        },
        {
            label: '# Prediction',
            data: [],
            backgroundColor:'transparent',
            borderColor:'red',
            borderWidth: 4
        }
    ]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});

