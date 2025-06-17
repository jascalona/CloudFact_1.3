

/**GRAFICAS DASHBOARD */
document.addEventListener('DOMContentLoaded', function () {
  // Inicializa el gráfico
  const chart = echarts.init(document.getElementById('grafico'));

  // Configuración del gráfico (ejemplo: gráfico de barras)
  const opciones = {
    title: {
      text: ''
    },
    tooltip: {},
    xAxis: {
      data: ['Ene', 'Feb', 'Mar', 'Abr', 'May']
    },
    yAxis: {},
    series: [{
      name: 'Ventas',
      type: 'bar',
      data: [120, 200, 150, 80, 70]
    }]
  };

  // Aplica la configuración
  chart.setOption(opciones);
});


document.addEventListener('DOMContentLoaded', function () {
  var chart = echarts.init(document.getElementById('grafico-torta'));
  chart.setOption({
    title: {
      text: '',
      left: 'center'
    },
    tooltip: {
      trigger: 'item'
    },
    legend: {
      orient: 'vertical',
      left: 'left'
    },
    series: [
      {
        name: 'Access From',
        type: 'pie',
        radius: '50%',
        data: [
          { value: 1048, name: 'Search Engine' },
          { value: 735, name: 'Direct' },
          { value: 580, name: 'Email' },
          { value: 484, name: 'Union Ads' },
          { value: 300, name: 'Video Ads' },
          { value: 1000, name: 'Hola mundo' }
        ],
        emphasis: {
          itemStyle: {
            shadowBlur: 10,
            shadowOffsetX: 0,
            shadowColor: 'rgba(0, 0, 0, 0.5)'
          }
        }
      }
    ]
  });
});

