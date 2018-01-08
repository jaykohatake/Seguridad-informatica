
<div class="row">
    <div class="col s10 offset-s1">
        <?php echo validation_errors('<div class="chip blue col s6">', '<i class="material-icons">close</i></div>'); ?>
    </div>
</div>
<?php
echo form_open('Fotos/registrarAlbumxImage',array('id'=>'formulario'));
?>
<div class="conteiner">
    <div class="card-panel">
      <div class="row">
        <div class="col s4 offset-s4">
          <div class="input-field"> <label for="orderNumber">Orden</label> <input type ="number" validate name="orderNumber" value="<?php echo set_value('orderNumber'); ?>"/> </div>
          <div class="input-field">
            <select type="select" name="idAlbum">
           <option  disabled selected >Elija una opción</option>
            <?php foreach($albums as $alb){ ?>
              <option <?php if(set_value('idAlbum') == $alb->getId()){echo "selected";} ?> value="<?=$alb->getId();?>" ><?=$alb->getName();?></option>
            <?php } ?>
            </select>
          <label>Album</label>
          </div>

          <div class="input-field">
            <select type="select" name="idImage" >
           <option  disabled selected>Elija una opción</option>
            <?php foreach($imagenes as $img){ ?>
              <option <?php if(set_value('idImage')==$img->getId()){echo "selected";} ?> value="<?=$img->getId();?>"><?=$img->getTittle();?></option>
            <?php } ?>
            </select>
          <label>Imagen</label>
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
<script>
  $(document).ready(function() {
      $('select').material_select();
  });
</script>
