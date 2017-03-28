<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script> -->

<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('highcharts'); ?>
<?php echo $this->Html->script('exporting'); ?>
        
  <div class="col-sm-4 col-sm-offset-4">
      <?php echo $this->Form->create('Glicose'); ?>
          
          <div class="form-group">
              <?php echo $this->Form->input('mes', array('class' => 'form-control', 'label' => 'Mês', 'type' => 'select', 'options' => $meses));?>
          </div>
          <div class="form-group">
              <?php echo $this->Form->input('ano', array('class' => 'form-control', 'label' => 'Ano', 'type' => 'number', 'required'));?>
          </div>
          
          <div class="col-sm-12 center-block">
              <?php echo $this->Form->submit('Gerar Gráfico', array('class' => 'btn btn-lg btn-secondary')); ?>
          </div>

      <?php  echo $this->Form->end(); ?>
      <br><br><br><br><br>
  </div>
  
  <div class="container" id="grafico" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
  
  <?php 
      if(!empty($this->request->data)){
        if($this->request->data['Glicose']['mes'] == 1){
          $nomeMes = "Janeiro";
        }elseif($this->request->data['Glicose']['mes'] == 2){
          $nomeMes = "Fevereiro";
        }elseif($this->request->data['Glicose']['mes'] == 3){
          $nomeMes = "Março";
        }elseif($this->request->data['Glicose']['mes'] == 4){
          $nomeMes = "Abril";
        }elseif($this->request->data['Glicose']['mes'] == 5){
          $nomeMes = "Maio";
        }elseif($this->request->data['Glicose']['mes'] == 6){
          $nomeMes = "Junho";
        }elseif($this->request->data['Glicose']['mes'] == 7){
          $nomeMes = "Julho";
        }elseif($this->request->data['Glicose']['mes'] == 8){
          $nomeMes = "Agosto";
        }elseif($this->request->data['Glicose']['mes'] == 9){
          $nomeMes = "Setembro";
        }elseif($this->request->data['Glicose']['mes'] == 10){
          $nomeMes = "Outubro";
        }elseif($this->request->data['Glicose']['mes'] == 11){
          $nomeMes = "Novembro";
        }elseif($this->request->data['Glicose']['mes'] == 12){
          $nomeMes = "Dezembro";
        }
        $nomedoGrafico = 'Taxas de Glicose Registradas no mês de ' . $nomeMes;
      }
  ?>
                          
  <script type="text/javascript">

      Highcharts.chart('grafico', {
          chart: {
              type: 'line'
          },
          title: {     
              text: '<?php echo $nomedoGrafico; ?>'
          },
          
          xAxis: {
              type: 'datetime',
               dateTimeLabelFormats: { // don't display the dummy year
                  month: '%e. %b',
                  year: '%b'
              }
          },
          yAxis: {
              title: {
                  text: 'Taxa (mg/dl)'
              }
          },
          plotOptions: {
              line: {
                  dataLabels: {
                      enabled: true
                  },
                  enableMouseTracking: true
              }
          },
          series: [{
              name: 'Glicose',
              data: [
                        <?php foreach ($glicoses as $g) {
                            $date = $g['Glicose']['data'];
                            $dia = date('d', strtotime($date));    
                            $mes = date('m', strtotime($date));    
                            $ano = date('Y', strtotime($date));  ?>
                         [Date.UTC(<?php echo $ano; ?> ,  
                                   <?php echo $mes; ?> ,
                                   <?php echo $dia; ?>                                   
                                  ),
                         <?php echo $g['Glicose']['valor']; ?> ],
                        <?php  } ?>
                    ]
          }]
      });

  </script>