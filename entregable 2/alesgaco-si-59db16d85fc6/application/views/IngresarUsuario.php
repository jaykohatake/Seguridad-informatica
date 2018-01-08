
<div class="row">
    <div class="col s10 offset-s1">
        <?php echo validation_errors('<div class="chip blue col s6">', '<i class="material-icons">close</i></div>'); ?>
    </div>
</div>
<?php
echo form_open_multipart('Fotos/guardar',array('id'=>'formulario'));
?>
<div class="conteiner">
    <div class="card-panel">
      <div class="row">
        <div class="col s4 offset-s2">
          <div class="input-field"> <label for="id">Cedula</label> <input type ="text" name="id" value="<?php echo set_value('id'); ?>"/> </div>
          <div class="input-field"> <label for="rol">Rol</label> <input type ="text" name="rol" value="<?php echo set_value('id'); ?>"/> </div>
          <div class="input-field"> <label for="name">Nombre</label> <input type ="text" name="name" value="<?php echo set_value('name'); ?>"/> </div>
          <div class="input-field"> <label for="nickName">Apodo</label> <input type ="text" name="nickName" value="<?php echo set_value('nickName'); ?>"/> </div>
          <div class="input-field"> <label for="pass">Contraseña</label>  <input type ="password" name="pass" value="<?php echo set_value('pass'); ?>"/> </div>
        </div>
        <div class="col s4">
          <div class="card-image">
            <div class="card hoverable">
              <div class="center">
                <img id="img" widht="200" height="200">
              </div>
            </div>
          </div>
          <div class="file-field input-field">
            <div class="btn">
              <span>Avatar</span>
              <input type="file" id="firma" name="avatar"  hidden>
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" onchange="previewFile()" type="text">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="center">
          <button class="btn waves-effect waves-light" type="submit" name="Enviar" value="Enviar">Enviar
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <?php echo form_close();?>





<!-- ################################################################################################################################ -->

<script>
  function previewFile() {
      var preview = document.querySelector('#img'); //selects the query named img
      var file = document.querySelector('input[type=file]').files[0]; //sames as here
      var reader = new FileReader();
      reader.onloadend = function() {
          preview.src = reader.result;
      }
      if (file) {
          reader.readAsDataURL(file); //reads the data as a URL
      } else {
          preview.src = "";
      }
  }
</script>
