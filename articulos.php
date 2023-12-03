<?php include('header.php'); ?>
<?php
if (isset($_REQUEST['mode'])=='remove') {

	    	$strsql = "Delete from articulos where id=".addslashes($_REQUEST['id']);
			$result = MySQLSESSION_ExecuteSQL($strsql);
			
	}

?>
<script type="text/javascript">
function deleteAlert(name,id){

	var conBox = confirm("Desea Borrar: " + name);

	if(conBox){ 

		location.href="<?php $_SERVER['PHP_SELF']; ?>?id="+ id + "&mode=remove";

	}else{

		return;

	}

}
</script>	
<script type="text/javascript">
function expandFilters() {
  var s_val;
  var b_do_show;

  var o_item = $('#dv_filter_1');

  if (!o_item) {
    return false;
  }

  if (o_item.is(':visible') && (o_item.css('display')!='none')) {
    s_tx = '+ Consultas';
    b_do_show = false;
  }
  else {
    s_tx = '- Consultas';
    b_do_show = true;
  }

  for (i=1; i<20; i++) {
    o_item = $('#dv_filter_'+i);
    if (o_item.size()>0) {
      if (b_do_show) {
        o_item.show();
      }
      else {
        o_item.hide();
      }
    }
    else {
      break;
    }
  }

  o_item = $('#cmd_expand');
  if (o_item) {
    o_item.val(s_tx);
  }
}
</script>	

			
			
			<div class="row-fluid sortable">
			  <!--/span-->
</div>
<!--/row-->

			<div class="row-fluid sortable">
			  <!--/span-->
			  <!--/span-->
</div>
<!--/row-->
			
			<div class="row-fluid sortable">
			  <!--/span-->
			  <!--/span-->
</div>
<!--/row-->
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2>Artículos</h2>
						<!--<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
						
				<table class="table table-bordered table-striped table-condensed">
							  <thead>
                             <tr>
									  <th colspan="9" >
									<!--  <form name="frm_search" id="frm_search" method="post" action="propiedades.php" class="form-horizontal" style="float:left">
                                        <table border="0" cellpadding="0" cellspacing="0" class="table table-bordered">
                                          <tr>
                                            <td colspan="2"><input name="cmd_expand" id="cmd_expand" type="button" class="btn btn-info" style="width:95px" value="+ Consultas" title="Buscar" onclick="javascript:expandFilters();" /></td>
                                          </tr>
                                          <tr id="dv_filter_1" style="display:none;" >
                                            <td width="130">Nombre
                                                <input name="buscar" type="hidden" id="buscar" value="1" />
                                            </td>
                                            <td><select name="nombre" id="nombre" id="selectError" data-rel="chosen">
                                                <option value="0"></option>
                                               <?php
					$sqlpais = "select * from propiedades order by nombre asc";
			        $resultpais = MySQLSESSION_ExecuteSQL($sqlpais);
			        while ($rowpais = mysqli_fetch_array($resultpais)) {
					
					?>
                                                <option value="<?php echo $rowpais['id']; ?>" ><?php echo $rowpais['nombre']; ?></option>
                                                <?php }  ?>
                                            </select></td>
                                          </tr>
                                          <tr id="dv_filter_2" style="display:none;" >
                                            <td width="130">Tipo</td>
                                            <td><select name="inmueble" id="inmueble" id="selectError2" data-rel="chosen">
                                                <option value="0"></option>
                                                <?php
					$sqlpais = "select * from inmuebles where id IN (select inmueble from propiedades) order by inmueble asc";
			        $resultpais = MySQLSESSION_ExecuteSQL($sqlpais);
			        while ($rowpais = mysqli_fetch_array($resultpais)) {
					
					?>
                                                <option value="<?php echo $rowpais['id']; ?>" ><?php echo $rowpais['inmueble']; ?></option>
                                                <?php }  ?>
                                            </select></td>
                                          </tr>
                                          <tr id="dv_filter_3" style="display:none;" >
                                            <td width="130">Barrio Cerrado / Country</td>
                                            <td><select name="barrio" id="barrio" id="selectError5" data-rel="chosen">
                                                <option value="0"></option>
                                                <?php
					$sqlpais = "select * from geo_barrios where id IN (select barrio from propiedades)  order by barrio asc";
			        $resultpais = MySQLSESSION_ExecuteSQL($sqlpais);
			        while ($rowpais = mysqli_fetch_array($resultpais)) {
					
					?>
                                                <option value="<?php echo $rowpais['id']; ?>" ><?php echo $rowpais['barrio']; ?></option>
                                                <?php }  ?>
                                            </select>
                                            </td>
                                          </tr>
                                          
                                         
                                          <tr id="dv_filter_4" style="display:none;" >
                                            <td width="130">Estado</td>
                                            <td>  <select name="estado" id="estado" id="selectError9" data-rel="chosen">
                                                <option value="0"></option>
                                                <?php
					$sqlpais = "select * from estados order by estado asc";
			        $resultpais = MySQLSESSION_ExecuteSQL($sqlpais);
			        while ($rowpais = mysqli_fetch_array($resultpais)) {
					
					?>
                                                <option value="<?php echo $rowpais['id']; ?>" ><?php echo $rowpais['estado']; ?></option>
                                                <?php }  ?>
                                            </select>
                                            </td>
                                          </tr>
										 <tr id="dv_filter_5" style="display:none;" >
                                            <td width="130">Estado Venta</td>
                                            <td>  <select name="estadoventa" id="estadoventa" id="selectError9" data-rel="chosen">
                                                <option value="0"></option>
                                                <?php
					$sqlpais = "select * from estadosventa order by estado asc";
			        $resultpais = MySQLSESSION_ExecuteSQL($sqlpais);
			        while ($rowpais = mysqli_fetch_array($resultpais)) {
					
					?>
                                                <option value="<?php echo $rowpais['id']; ?>" ><?php echo $rowpais['estado']; ?></option>
                                                <?php }  ?>
                                            </select>
                                            </td>
                                          </tr>  
                                         
                                          <tr id="dv_filter_6" style="display:none;" >
                                            <td width="130">Publicada</td>
                                            <td><input name="activo" type="checkbox" value="1"></td>
                                          </tr>
                                       
                                          <tr  id="dv_filter_7" style="display:none;"  >
                                            <td colspan="2"><input name="cmd_search" id="cmd_search" type="submit" class="btn btn-info" value="Buscar" style="width:70px;" /></td>
                                          </tr>
                                        </table>
                                        <?php   if (isset($_REQUEST['buscar'])==1) { ?>
  Resultados para la consulta&nbsp;&nbsp;<a class="btn"  href="propiedades.php"><i class="icon-refresh" title="Quitar Filtros"></i></a>
  <?php  }  ?>
                                      </form>-->
									  <a style="float:right" class="btn btn-success" href="articulos-alta.php"> <i class="icon-plus icon-white"></i>Nuevo</a></th>
							    </tr>
								  								  <tr>
									  <th>Foto</th>
									  
									  <th>Categoría</th>
									  <th>Marca</th>
									<th>Nombre</th> 
									<th>Modelo</th>
									  <th>Precio</th>
									  <th>Publicar</th>
									             
								      <th>Acciones</th>
								  </tr>
							  </thead>   
							  <tbody>
								<?php
$pag=$_GET["pag"];
if (!isset($pag)) $pag = 1; // Por defecto, pagina 1
$tampag = 100;
$columna = 1;
$reg1 = ($pag-1) * $tampag;


$sql="select * from articulos LEFT JOIN categorias ON articulos.id_categoria = categorias.id_categoria LEFT JOIN marcas ON articulos.id_marca = marcas.id_marca WHERE 1";
			
	/*		if ($_REQUEST['nombre']!=0) { $where1=" and id=".$_REQUEST['nombre'].""; $nombre=$_REQUEST['nombre']; }else{ $where1=''; $nombre='';  }
			if ($_REQUEST['inmueble']!=0) { $where3=" and inmueble=".$_REQUEST['inmueble'].""; $inmueble=$_REQUEST['inmueble']; }else{ $where3=''; $inmueble='';  }
			if ($_REQUEST['barrio']!=0) { $where4=" and barrio=".$_REQUEST['barrio'].""; $barrio=$_REQUEST['barrio']; }else{ $where4=''; $barrio='';  }
			if ($_REQUEST['estado']!=0) { $where5=" and estado=".$_REQUEST['estado'].""; $estado=$_REQUEST['estado']; }else{ $where5=''; $estado='';  }
			if ($_REQUEST['estadoventa']!=0) { $where6=" and estadoventa=".$_REQUEST['estadoventa'].""; $estadoventa=$_REQUEST['estadoventa']; }else{ $where6=''; $estadoventa='';  }
		
			if ($_REQUEST['activo']!="") { $where7=" and activo=".$_REQUEST['activo'].""; $activo=$_REQUEST['activo']; }else{ $where7=''; $activo='';  }

$result = MySQLSESSION_ExecuteSQL($sql.$where1.$where3.$where4.$where5.$where6.$where7." order by id asc");*/
$result = MySQLSESSION_ExecuteSQL($sql." order by id asc");
$linea= 1;
		
$total = mysqli_num_rows($result);

for ($i=$reg1; $i<min($reg1+$tampag, $total); $i++) {
    mysqli_data_seek($result, $i);
	$row = mysqli_fetch_array($result);
	
	?>
                                <tr>
									<td> <img  style=" max-width:100px;" src="../uploads/<?php echo $row['foto']; ?>" ></td>									
									<td class="center"><?php echo $row['categoria']; ?></td>
									<td class="center"><?php echo $row['marca']; ?></td>
										<td class="center"><?php echo $row['nombre']; ?></td>
											<td class="center"><?php echo $row['modelo']; ?></td>
										
									<td class="center"> <?php echo $row['precio']; ?></td>
									
									<td class="center">
										<?php if ($row['activo']==1) { ?><span class="label label-success">Publicado</span><?php } ?></td>
								 
								    <td class="center"> <a class="btn btn-info" href="articulos-editar.php?id=<?php echo $row['id']; ?>&action=modificar"> <i class="icon-edit icon-white"></i> Editar </a> <a class="btn btn-danger" href="javascript: deleteAlert('<?php echo $row['nombre'].'  ' .$row['modelo'];  ?>','<?php echo $row['id'];?>')"> <i class="icon-trash icon-white"></i> Borrar </a> </td>
								
								
								</tr>
                                <?php 
     $linea++; 
    }  ?>
							  </tbody>
						 </table>  
<div class="pagination pagination-centered">
						  <ul>
							<?php //if (isset($_REQUEST['buscar'])==1) { 
						     		//echo paginar($pag, $total, $tampag, "propiedades.php?nombre=$nombre&inmueble=$inmueble&barrio=$barrio&estado=$estado&estadoventa=$estadoventa&activo=$activo&buscar=1&pag=");
						       	// }else{
							        echo paginar($pag, $total, $tampag, "articulos.php?pag=");
							    // }?>
						  </ul>
						</div>     
			   
					</div>
				</div><!--/span-->
			</div><!--/row-->
  
<?php include('footer.php'); ?>
