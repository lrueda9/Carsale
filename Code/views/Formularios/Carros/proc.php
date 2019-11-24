
<?php 
require_once '../../../modelo/conexion.php';
require_once '../../../modelo/Modelos/Entidad.php';
require_once '../../../modelo/Modelos/Modelo.php';
$almModelos = new Modelos();
$modelModelos = new Modelos_Model();
$datos=$modelModelos->Obtener($_POST['q']);
if ($datos==null) {
	echo "NO EXISTEN MODELOS, PARA LA MARCA DE VEHÍCULO SELECCIONADA";
}else{
?>
<select name="modelo">
	<?php foreach($datos as $k): ?>
	<option value="<?php echo $k->__GET('id');?>"><?php echo $k->__GET('det');?></option>
	<?php endforeach; ?>
</select>
<label>Modelo</label>
<button type="submit" class="waves-effect waves-light btn col s12 cyan">Guardar</button>
<?php }?>