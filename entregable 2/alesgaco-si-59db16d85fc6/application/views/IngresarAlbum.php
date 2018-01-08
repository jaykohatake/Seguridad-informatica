
<div class="row">
    <div class="col s10 offset-s1">
        <?php echo validation_errors('<div class="chip blue col s6">', '<i class="material-icons">close</i></div>'); ?>
    </div>
</div>
<?php
echo form_open('Fotos/registrarAlbum',array('id'=>'formulario'));
?>
<div class="conteiner">
    <div class="card-panel">
      <div class="row">
        <div class="col s4 offset-s4">
          <div class="input-field"> <label for="name">Nombre</label> <input type ="text" name="name" value="<?php echo set_value('name'); ?>"/> </div>
          <div class="input-field"> <label for="description">Descripcion</label> <textarea type ="textarea" class="materialize-textarea" name="description" value="<?php echo set_value('description'); ?>"/></textarea> </div>
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
