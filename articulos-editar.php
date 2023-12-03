<?php include('header.php'); ?>
<?php


    if ( isset($_POST['Alta'])) {

       extract($_POST);
	   		
		$activo=0;
		$alta=date('Y-m-d H:i:s');
	 									
									$url=urls_amigables($nombre);
		
		$sql="Insert into articulos (nombre,  id_categoria,  id_marca, activo,  fecha_alta, url )
				values ('$nombre',  '$categoria', '$marca', '$activo', '$alta', '$url')";
				
				
	
     mysqli_query($_SESSION['dbdatabase'], "SET SESSION sql_mode = ' ' ");   
         
		$result = MySQLSESSION_ExecuteSQL($sql);
		
		$sqledit="select * from articulos order by id desc limit 0,1";
		$resultedit = MySQLSESSION_ExecuteSQL($sqledit);
		$rowedit=mysqli_fetch_array($resultedit); 
        $idn=$rowedit['id'];
		
	


		
				
}

if ( isset($_REQUEST['Modificar'])) {

        extract($_REQUEST);
		
		
	if($_FILES['foto']['name'] != ""){ // El campo foto contiene una imagen...
        
        // Primero, hay que validar que se trata de un JPG/GIF/PNG
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $ext = explode(".", $_FILES["foto"]["name"]);
		$extension = end($ext);
        
              if ((($_FILES["foto"]["type"] == "image/gif")
                || ($_FILES["foto"]["type"] == "image/jpeg")
                || ($_FILES["foto"]["type"] == "image/png")
                || ($_FILES["foto"]["type"] == "image/pjpeg"))
                && in_array($extension, $allowedExts)) {
            // el archivo es un JPG/GIF/PNG, entonces...
            
            $extension = end(explode('.', $_FILES['foto']['name']));
            $foto = substr(md5(uniqid(rand())),0,10).".".$extension;
            $directorio = '../uploads'; // directorio de tu elecci&oacute;n
            
            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio.'/'.$foto);
            //$minFoto = 'min_'.$foto;
            $resFoto = 'res_'.$foto;
            //resizeImagen($directorio.'/', $foto, 65, 65,$minFoto,$extension);
            resizeImagen($directorio.'/', $foto, 800, 533,$resFoto,$extension);
            unlink($directorio.'/'.$foto);
			
			
            
        } else { // El archivo no es JPG/GIF/PNG
            $malformato = $_FILES["foto"]["type"];
           
          }
        
    } else { 
	
		$resFoto=$fotoactual;
    }	
									
									$url=urls_amigables($nombre);
	
			
			$sql="update articulos set nombre='$nombre', 
			                             activo='$activo', 
										 id_categoria='$categoria', 
										 id_marca='$marca',
										 activo='$activo',
										 modelo='$modelo', 
										 detalle='$detalle', 
										 precio='$precio',
										 foto='$resFoto',
										 url='$url'
									     where id='$id'";
			
			
			
                                 
			  mysqli_query($_SESSION['dbdatabase'], "SET SESSION sql_mode = ' ' ");   							
		$result = MySQLSESSION_ExecuteSQL($sql);
		
		
				
}




?>

<?php
   if ( isset($_POST['Alta'])) {
$id=$idn;
}else{
$id=$_REQUEST['id'];
}


$action=$_REQUEST['action'];

//if ($action =='modificar') {
$sql="select * from articulos where id=".addslashes($id);
$result = MySQLSESSION_ExecuteSQL($sql);
$row=mysqli_fetch_array($result); 
//}
?>
			
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>Artículos</h2>
						
					</div>
					
					
				  	<div class="box-content">
					
              
                      <form class="form-horizontal" name="frm-usuarios" id="frm" method="post" enctype="multipart/form-data" action="propiedades-editar.php?action=modificar">
                        <fieldset>
						<div class="control-group">
                          <label class="control-label" for="focusedInput">Nombre</label>
                         
<div class="controls">
                            <input name="nombre" type="text" class="input-xlarge focused" id="focusedInput" value="<?php echo $row['nombre']; ?>" >
                                <input name="action" type="hidden" id="action" value="modificar" />
							<?php if ($action =='modificar') {  ?>
							<input name="id" type="hidden" value="<?php echo $id ?>" />
							<?php } ?>
                          </div>
                        </div>
						   <div class="control-group">
                          <label class="control-label" for="selectError3">Publicar</label>
                          <div class="controls">
                         
                            <select name="activo" id="activo" class="input-mini focused" >
                               <option value="<?php echo $row['activo']; ?>"><?php if ($row['activo']==1) { echo 'Si'; }else{ echo 'No'; } ?></option>
               <?php if ($row['activo']==1) { ?><option value="0" >No</option><?php } ?>
                <?php if ($row['activo']==0) { ?><option value="1">Si</option><?php } ?>
                            </select>
                          </div>
                        </div>
                       
						<div class="control-group">
                          <label class="control-label" for="label">Categoría</label>
                          <div class="controls">
                            
							<select name="categoria"id="selectError1"  >
                           
							  <?php
					$sqlpais = "select * from categorias order by categoria asc";
			        $resultpais = MySQLSESSION_ExecuteSQL($sqlpais);
			        while ($rowpais = mysqli_fetch_array($resultpais)) {

					if  ($rowpais['id_categoria'] == $row['id_categoria']) {
					?>
                              <option value="<?php echo $rowpais['id_categoria']; ?>" selected="selected"><?php echo $rowpais['categoria']; ?></option>
                              <?php }else{ ?>
                              <option value="<?php echo $rowpais['id_categoria']; ?>" ><?php echo $rowpais['categoria']; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                        </div>
						
						<div class="control-group">
                          <label class="control-label" for="label">Marca</label>
                          <div class="controls">
                           <select name="marca"id="selectError5"  >
							
                              <?php
					$sqlpais = "select * from marcas order by marca asc";
          $resultpais = MySQLSESSION_ExecuteSQL($sqlpais);
          while ($rowpais = mysqli_fetch_array($resultpais)) {

      if  ($rowpais['id_marca'] == $row['id_marca']) {
					?>
                              <option value="<?php echo $rowpais['id_marca']; ?>" selected="selected"><?php echo $rowpais['marca']; ?> </option>
                              <?php }else{ ?>
                              <option value="<?php echo $rowpais['id_marca']; ?>" ><?php echo $rowpais['marca']; ?></option>
                              <?php } } ?>
                            </select>
                          </div>
                        </div>
                         <div class="control-group">
                          <label class="control-label" for="focusedInput">Modelo</label>
                          <div class="controls">
                            <input name="modelo" type="text" class="input-medium focused" id="focusedInput" value="<?php echo $row['modelo']; ?>">
                            
							
                          </div>
                        </div>
                        
                        
						
						<div class="control-group">
                          <label class="control-label" for="focusedInput">Descripci&oacute;n</label>
                          <div class="controls">
                            <textarea name="detalle" rows="7" class="input-xlarge focused" id="focusedInput"  ><?php echo $row['detalle']; ?></textarea>
                            
							
                          </div>
                        </div>
						
                       
						
						
						 
						 <div class="control-group">
                          <label class="control-label" for="label">Precio</label>
                          <div class="controls">
                             <input name="precio" type="number" class="input-medium focused" id="focusedInput" value="<?php echo $row['precio']; ?>" > 
                          </div>
                        </div>
                        
                         <div class="control-group">
                          <label class="control-label" for="label">Fecha de Alta</label>
                          <div class="controls">
                             <input name="fechaalta" type="text" class="input-medium focused" id="focusedInput" value="<?php echo date("d/m/Y",strtotime($row['fecha_alta'])); ?>" disabled > 
                          </div>
                        </div>
						                         
                    
						 <div class="control-group">
                          <label class="control-label" for="label">Foto <br> ( jpg, gif, png )</label>
                          <div class="controls">
						   <?php if ($row['foto'] != NULL)  { ?>
						   <img  style=" max-width:250px;" src="../uploads/<?php echo $row['foto']; ?>" >
										
										<?php }else{ ?>
										Foto no disponible 
										<?php } ?>
										
										<input name="fotoactual" type="hidden"  value="<?php echo $row['foto']; ?>" size="20"  />
										<p><input name="foto" type="file" class="input-file uniform_on" id="fileInput"></p>
                            
                          </div>
                        </div>                    
                    
                          
                          <div class="control-group warning">
                          <label class="control-label" for="inputWarning"></label>
                        </div>
                          <div class="form-actions">
                          <?php if ($_REQUEST['action']=='alta') { ?>
                          <input name="Alta"  type="submit" class="btn btn-primary" value="Enviar" />	
						  <?php } ?>
                          <?php if ($_REQUEST['action']=='modificar') { ?>
						
                          <input name="Modificar"  type="submit" class="btn btn-primary" value="Modificar" />	
						  <?php } ?>
                          <input name="Volver"  type="button" class="btn" value="Volver" onclick="location.href='articulos.php';" />	
                          </div>
												
                        </fieldset>
                      </form>  
					
					
				   </div> <!--box content -->
				</div><!--/span-->
			</div><!--/row-->
       
<?php include('footer.php'); ?>
