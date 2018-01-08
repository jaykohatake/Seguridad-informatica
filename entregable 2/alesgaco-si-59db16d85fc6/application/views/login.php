
<div class="row">
    <div class="col s10 offset-s1">
        <?php echo validation_errors('<div class="chip blue col s6">', '<i class="material-icons">close</i></div>'); ?>
    </div>
</div>
<?php
echo form_open_multipart('Fotos/login',array('id'=>'formulario'));
?>
<div class="conteiner">
    <div class="card-panel">
      <div class="row">
        <div class="col s4  offset-s4">
          <div class="input-field"> <label for="usuario">Usuario</label> <input type ="text" name="nickName" value="<?php echo set_value('nickName'); ?>"/> </div>
          <div class="input-field"> <label for="contrase">Contraseña </label> <input type ="password" name="pass" value="<?php echo set_value('pass'); ?>"/> </div>
      </div>
      </div>
      <div class="row">
        <div class="center">
          <button class="btn waves-effect waves-light" type="submit" name="Enviar" value="Enviar">Loguearse
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close();?>
