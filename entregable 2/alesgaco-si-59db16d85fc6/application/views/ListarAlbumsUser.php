<div class="container-fluid">
<div class="row">
		  <div class="col-sm-6 col-md-3">
		    <div class="thumbnail">
          <?php foreach($albums as $al){?>
          <p>Nombre de album: <?=$al->getName();?> <a href="<?=site_url('Fotos/ListarFotos')."/".$al->getId();?>">Ver fotos</a></p>
          <?php }?>
        </div>
		  </div>
		</div>
</div>
