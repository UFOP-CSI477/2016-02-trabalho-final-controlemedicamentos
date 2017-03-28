 <div class="container well col-sm-6 col-sm-offset-3">		
		
	<h3 align="center">Editar Medição de Pressão</h3>
	<br>

	<div class="col-sm-8 col-sm-offset-2">
	<?php echo $this->Form->create('Pressure', array('controller' => 'pressures', 'url' => 'cadastrar')); ?>
		
		<div class="form-group">
            <?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => 'Id'));?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input('usuario_id', array('class' => 'form-control', 'type' => 'hidden', 'value' => $this->Session->read('User')[0]['Usuario']['id']));?>
        </div>

		<div class="form-group">
            <?php echo $this->Form->input('data', array('class' => 'form-control', 'label' => 'Data'));?>
        </div>

        <div class="form-group">
            <?php echo $this->Form->input('valor1', array('class' => 'form-control', 'label' => 'Pressão Máxima'));?>
        </div>

		<div class="form-group">
            <?php echo $this->Form->input('valor2', array('class' => 'form-control', 'label' => 'Pressão Mínima'));?>
        </div>

		<br>
		<div class="col-sm-12 center-block">
            <?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-lg btn-secondary btn-block')); ?>
        </div>

	<?php echo $this->Form->end(); ?>
	</div>
	
</div>