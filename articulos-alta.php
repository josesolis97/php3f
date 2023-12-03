<?php include('header.php'); ?>

			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>Articulos</h2>
						<!--<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>-->
					</div>
					
					
					<div class="box-content">
                      <form class="form-horizontal" name="frm-usuarios" id="frm" method="post" enctype="multipart/form-data" action="articulos-editar.php">
                        <fieldset>
						
						<div class="control-group">
                          <label class="control-label" for="focusedInput">Nombre</label>
                         
<div class="controls">
                            <input name="nombre" type="text" class="input-xlarge focused" id="focusedInput"  required="required">
                              <input name="action" type="hidden" class="input-xlarge focused" id="focusedInput"  value="modificar">
                          </div>
                        </div>
						
						<div class="control-group">
                          <label class="control-label" for="label">Categoría</label>
                          <div class="controls">
                            
							<select name="categoria"id="selectError1"  >
                           
							  <?php
					$sqlcat = "select * from categorias order by categoria asc";
			        $resultcat = MySQLSESSION_ExecuteSQL($sqlcat);
			        while ($rowcat = mysqli_fetch_array($resultcat)) {
					
					?>
                              
                              <option value="<?php echo $rowcat['id_categoria']; ?>" ><?php echo $rowcat['categoria']; ?></option>
                              <?php }  ?>
                            </select>
                          </div>
                        </div>
						
                        <div class="control-group">
                          <label class="control-label" for="label">Marca</label>
                          <div class="controls">
                            
							<select name="marca"id="selectError2"  >
                           
							  <?php
					$sqlmc = "select * from marcas order by marca asc";
			        $resultmc = MySQLSESSION_ExecuteSQL($sqlmc);
			        while ($rowmc = mysqli_fetch_array($resultmc)) {
					
					?>
                              
                              <option value="<?php echo $rowmc['id_marca']; ?>" ><?php echo $rowmc['marca']; ?></option>
                              <?php }  ?>
                            </select>
                          </div>
                        </div>
						
						
						
						
						
			
                      
                          <div class="control-group warning">
                          <label class="control-label" for="inputWarning"></label>
                        </div>
                          <div class="form-actions">
                         
                          <input name="Alta"  type="submit" class="btn btn-primary" value="Continuar" />	
						 
                         
                          <input name="Volver"  type="button" class="btn" value="Volver" onclick="location.href='articulos.php';" />	
                          </div>
                        </fieldset>
                      </form>
					 
				  </div>
				</div><!--/span-->
			</div><!--/row-->
       
<?php include('footer.php'); ?>
