<?php 
# importando o arquivo php, responsavel por mexer com a base de dados
require 'dados.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ELEIÇÃO CIPA</title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/candidatos.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  </head>
  
  <body>

  <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
      Escolha o método de visualização 
    </p>
<!--====Butões para alterar a previsualização do gráfico===-->
    <button id="plain">Plain</button>
    <button id="inverted">Inverted</button>
    <a href="home.html"><button id="polar">VOLTAR</button></a>
    
</figure>
      <!-- ======= BIBLIOTECAS IMPORTANTES ======= -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!--===========TAGS PADRÃO, Possivel de Ser Alteradas ========-->

    <script type="text/javascript">
var chart = Highcharts.chart('container', {
/*Título do seu Gráfico e estilo
     para maior compreensão recomendo-te ler a documentação
     https://www.highcharts.com*/
     title: {
        text: 'GRÁFICO DO RESULTADO DOS VOTOS POR ORDEM ALFABÉTICA',
        style:{
          color:'teal',
          fontSize: '10px',
         
        },
        
    },

    subtitle: {
        text: ' plain'
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
          'André',
                    'Caleb',
                    'Daniel',
                    'Emanuel',
                    'Felipe',
                    'Gabriel',
                    'João',
                    'José',
                    'Lucas',
                    'Matheus',
                    'Marcos',
                    'Miguel',
                    'Noah',                    
                    'Pedro',
                    'Tiago',
                    'Rafael'
        ]
      },
      series: [{
        name: 'votos',
        type: 'column',
        colorByPoint: true,
        data: [
          /*Alterando os dados do gráfico de uma forma dinâmica
        essa estrutura de condição vai apresentar no gráfico o candidato do candidato
        e os votos, de acordo com os dados que estiver na
        base de dados
        */
          <?php while ($resultado = $busca->fetch()) { ?>['<?= $resultado->candidato ?>', <?= $resultado->votos ?>],
          <?php } ?>


        ],
        showInLegend: false
      }]

    });


    $('#plain').click(function() {
      chart.update({
        chart: {
          inverted: false,
          polar: false
        },
        subtitle: {
          text: ' plain'
        }
      });
    });

    $('#inverted').click(function() {
      chart.update({
        chart: {
          inverted: true,
          polar: false
        },
        subtitle: {
          text: 'inverted'
        }
      });
    });

    $('#polar').click(function() {
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
  </script>
</body>

</html>