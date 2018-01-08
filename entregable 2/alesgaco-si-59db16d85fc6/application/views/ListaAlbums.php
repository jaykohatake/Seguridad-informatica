<div class="container-fluid">
<div class="row">
		  <div class="col-sm-6 col-md-3">
		    <div class="thumbnail">
          <?php foreach($imagenes as $img){?>
          <img src="<?=base_url()."uploads/Albums/" .$img->getPhoto(); ?>">
          <p>Nombre: <?=$img->getTittle();?></p>
          <p>description: <?=$img->getDescription();?></p>
          <?php }?>
        </div>
		  </div>
		</div>
</div>
