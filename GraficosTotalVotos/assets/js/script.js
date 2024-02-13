'use strict'

function $(selector) {
  return document.querySelector(selector)
}

function find(el, selector) {
  let finded
  return (finded = el.querySelector(selector)) ? finded : null
}

function siblings(el) {
  const siblings = []
  for (let sibling of el.parentNode.children) {
    if (sibling !== el) {
      siblings.push(sibling)
    }
  }
  return siblings
}

const showAsideBtn = $('.show-side-btn')
const sidebar = $('.sidebar')
const wrapper = $('#wrapper')

showAsideBtn.addEventListener('click', function () {
  $(`#${this.dataset.show}`).classList.toggle('show-sidebar')
  wrapper.classList.toggle('fullwidth')
})

if (window.innerWidth < 767) {
  sidebar.classList.add('show-sidebar');
}

window.addEventListener('resize', function () {
  if (window.innerWidth > 767) {
    sidebar.classList.remove('show-sidebar')
  }
})

// dropdown menu in the side nav
var slideNavDropdown = $('.sidebar-dropdown');

$('.sidebar .categories').addEventListener('click', function (event) {
  event.preventDefault()

  const item = event.target.closest('.has-dropdown')

  if (! item) {
    return
  }

  item.classList.toggle('opened')

  siblings(item).forEach(sibling => {
    sibling.classList.remove('opened')
  })

  if (item.classList.contains('opened')) {
    const toOpen = find(item, '.sidebar-dropdown')

    if (toOpen) {
      toOpen.classList.add('active')
    }

    siblings(item).forEach(sibling => {
      const toClose = find(sibling, '.sidebar-dropdown')

      if (toClose) {
        toClose.classList.remove('active')
      }
    })
  } else {
    find(item, '.sidebar-dropdown').classList.toggle('active')
  }
})

$('.sidebar .close-aside').addEventListener('click', function () {
  $(`#${this.dataset.close}`).classList.add('show-sidebar')
  wrapper.classList.remove('margin')
})


// Global defaults
Chart.defaults.global.animation.duration = 2000; // Animation duration
Chart.defaults.global.title.display = false; // Remove title
Chart.defaults.global.defaultFontColor = '#71748c'; // Font color
Chart.defaults.global.defaultFontSize = 13; // Font size for every label

// Tooltip global resets
Chart.defaults.global.tooltips.backgroundColor = '#111827'
Chart.defaults.global.tooltips.borderColor = 'blue'

// Gridlines global resets
Chart.defaults.scale.gridLines.zeroLineColor = '#3b3d56'
Chart.defaults.scale.gridLines.color = '#3b3d56'
Chart.defaults.scale.gridLines.drawBorder = false

// Legend global resets
Chart.defaults.global.legend.labels.padding = 0;
Chart.defaults.global.legend.display = false;

// Ticks global resets
Chart.defaults.scale.ticks.fontSize = 12
Chart.defaults.scale.ticks.fontColor = '#71748c'
Chart.defaults.scale.ticks.beginAtZero = false
Chart.defaults.scale.ticks.padding = 10

// Elements globals
Chart.defaults.global.elements.point.radius = 0

// Responsivess
Chart.defaults.global.responsive = true
Chart.defaults.global.maintainAspectRatio = false

// The bar chart
var chart = Highcharts.chart('container', {
  /*Título do seu Gráfico e estilo
       para maior compreensão recomendo-te ler a documentação
       https://www.highcharts.com*/
      title: {
          text: 'RESULTADO DOS VOTOS POR ORDEM ALFABÉTIC',
          style:{
            color:'teal',
            fontSize: '30px',
           
          },
          
      },
  
      subtitle: {
          text: 'Plain'
      },
       //O Autor do Gráfico
      credits:{
        enabled:false,
        text:'ELEIÇÃO CIPA 2023',
        href:'http://github.com/Afranioalves',
        position:{
          align:'left',
          x:10
          
        },
        style:{
          fontSize:'15px',
          color:'red',
        }
      },
    
      xAxis: {
        /*Dados alterados Estaticamente de acordo com as informações
        da base de dados, podem ser feitas dinamicamente*/
        categories: [
          'ALAN DOS SANTOS',
            'BEATRIZ MARQUES',
            'CLAUDIA MARIA',
            'EDSON ROBERTO',
            'JOAO REGIS',
            'JULIANA RODRIGUES',
            'LILIAN DA SILVA',
            'LUCIANA SOARES',
            'MARIA FERNANDA',
            'MONICA LINS',
            'MOISES OLIVEIRA',
            'ROBERTA CAROLINA',
            'ROSANA HAMADA',
            'SEBASTIÃO ALVES',
            'SELMA SILVEIRA',
            'SANDRA BRESSAN'
          ]
      },
      series: [{
        name:'Total de Votos',
          type: 'column',
          colorByPoint: true,
          data: [
            /*Alterando os dados do gráfico de uma forma dinâmica
          essa estrutura de condição vai apresentar no gráfico o numero do  Candidado
          e os quantidade_voto, de acordo com os dados que estiver na
          base de dados
          */
            <?php while( $resultado = $busca->fetch()){?>
              ['<?=$resultado->candidato?>', <?=$resultado->Votos?> ],
           <?php } ?>
             
             
          ],
          showInLegend: false
      }]
  
  });
  
  
  $('#plain').click(function () {
      chart.update({
          chart: {
              inverted: false,
              polar: false
          },
          subtitle: {
              text: 'Plain'
          }
      });
  });
  
  $('#inverted').click(function () {
      chart.update({
          chart: {
              inverted: true,
              polar: false
          },
          subtitle: {
              text: 'Inverted'
          }
      });
  });
  
  $('#polar').click(function () {
      chart.update({
          chart: {
              inverted: false,
              polar: true
          },
          subtitle: {
              text: 'Polar'
          }
      });
  });
  
// The line chart
var chart = new Chart(document.getElementById('myChart2'), {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", 'May', 'June', 'August', 'September'],
    datasets: [{
      label: "My First dataset",
      data: [4, 20, 5, 20, 5, 25, 9, 18],
      backgroundColor: 'transparent',
      borderColor: '#0d6efd',
      lineTension: .4,
      borderWidth: 1.5,
    }, {
      label: "Month",
      data: [11, 25, 10, 25, 10, 30, 14, 23],
      backgroundColor: 'transparent',
      borderColor: '#dc3545',
      lineTension: .4,
      borderWidth: 1.5,
    }, {
      label: "Month",
      data: [16, 30, 16, 30, 16, 36, 21, 35],
      backgroundColor: 'transparent',
      borderColor: '#f0ad4e',
      lineTension: .4,
      borderWidth: 1.5,
    }]
  },
  options: {
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false
        },
        ticks: {
          stepSize: 12,
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
        },
      }]
    }
  }
})

var chart = document.getElementById('chart3');
var myChart = new Chart(chart, {
  type: 'line',
  data: {
    labels: ["One", "Two", "Three", "Four", "Five", 'Six', "Seven", "Eight"],
    datasets: [{
      label: "Lost",
      lineTension: 0.2,
      borderColor: '#d9534f',
      borderWidth: 1.5,
      showLine: true,
      data: [3, 30, 16, 30, 16, 36, 21, 40, 20, 30],
      backgroundColor: 'transparent'
    }, {
      label: "Lost",
      lineTension: 0.2,
      borderColor: '#5cb85c',
      borderWidth: 1.5,
      data: [6, 20, 5, 20, 5, 25, 9, 18, 20, 15],
      backgroundColor: 'transparent'
    },
               {
                 label: "Lost",
                 lineTension: 0.2,
                 borderColor: '#f0ad4e',
                 borderWidth: 1.5,
                 data: [12, 20, 15, 20, 5, 35, 10, 15, 35, 25],
                 backgroundColor: 'transparent'
               },
               {
                 label: "Lost",
                 lineTension: 0.2,
                 borderColor: '#337ab7',
                 borderWidth: 1.5,
                 data: [16, 25, 10, 25, 10, 30, 14, 23, 14, 29],
                 backgroundColor: 'transparent'
               }]
  },
  options: {
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false
        },
        ticks: {
          stepSize: 12
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
        },
      }],
    }
  }
})
