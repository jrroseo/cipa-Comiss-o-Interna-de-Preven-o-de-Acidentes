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
  <!-- ======= BIBLIOTECAS IMPORTANTES ======= -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  
  <figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
      Escolha o método de visualização
    </p>
    <!--====Butões para alterar a previsualização do gráfico===-->
    <a href="barra3d.html"><button id="plain">BARRA 3D</button></a>
    <a href="Colum3D.php"><button id="inverted">BARRAS</button></a>
    <a href="home.html"><button id="polar">VOLTAR</button></a>

  </figure>

  <!--===========TAGS PADRÃO ========-->
  <figure class="highcharts-figure">
    <div id="container"></div>
  </figure>


  <!--=======  FAZENDO O GRÁFICO FUNCIONAR
A MAIORIA PARTE DESTE SCRIPT É PADRÃO
ONDE NÃO FOR, DEIXAREI COMENTÁRIO EXPLICANDO
O QUE ACABEI DE FAZER LA ====-->

  <script type="text/javascript">
    Highcharts.chart('container', {
      chart: {
        type: 'pie',
        options3d: {
          enabled: true,
          alpha: 45,
          beta: 0
        }
      },
      /*Título do seu Gráfico e estilo
      para maior compreensão recomendo-te ler a documentação
      https://www.highcharts.com*/

      title: {
        //Alterei o Titulo e o Estilo do titulo
        text: 'GRÁFICO DO RESULTADO DOS VOTOS POR ORDEM ALFABÉTICA',
        style: {
          color: 'teal',
          fontSize: '10px',

        },

      },


      //o Author do Gráfico
      credits: {
        text: 'Por: João Regis',
        href: 'http://github.com/Afranioalves',
        position: {
          align: 'left',
          x: 10

        },

      },

      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },

      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          Cursor: 'pointer',
          depth: 35,
          dataLabels: {
            enabled: true,
            format: '{point.name}'
          }
        }
      },
      series: [{
        type: 'pie',
        name: 'Voto/Porcento',
        data: [
          /*Alterando os dados do gráfico de uma forma dinâmica
          essa estrutura de condição vai apresentar no gráfico o nome do candidato
          e os votos, de acordo com os dados que estiver na
          base de dados
          */
          <?php while ($resultado = $busca->fetch()) { ?>['<?= $resultado->candidato ?>', <?= $resultado->votos ?>],
          <?php } ?>


        ]
      }]
    });
  </script>
</body>

</html>