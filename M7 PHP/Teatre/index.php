<?php
	include'teatre.class.php';
	include'obra.class.php';
	include'entrada.class.php';
	include 'seient.class.php';
?>
<HTML>
	<body>
	<h1>Teatre<h1>
		<?php
			$numF=6;
			$numC=6;
			$teatre = new Teatre();
			$nomTeatre =$teatre->getTeatre();

			$obra = new Obra();
			$obres = $obra->getObra();

			$seient = new Seient();
			$seient->inicialitzarSeients($numF,$numC);


			//Tabla Teatre-Obra
			echo "<table border=1>";
			echo "<tr><td align=center>Teatre</td><td align=center>Obra</td><td align=center>Num.Filas</td><td align=center>Num.Columnas</td>
				<td align=center>Disponibles</td></tr>";
			for($i=0;$i<count($obres);$i++){
				$disponibles = $seient->seientsDisponibles($obres[$i],'2017/01/25');
				echo "<tr><td align=center>".$nomTeatre."</td><td align=center>".$obres[$i]."</td><td align=center>".$numF."</td>
					<td align=center>".$numC."</td><td align=center>".$disponibles."</td></tr>";
			}
			echo "</table>";
		?>
		<hr>
		<h2>Comprar entrada</h2>
		<form method="post">
			<fieldset>
				<legend>Informacion Obra</legend>
			<?php
				echo"<label>Teatre: <select name='teatre'>
						<option value=".$nomTeatre.">".$nomTeatre."</option>;
					</select></label>";
			
				echo "<label> Obra: <select name='obres'>";
						for($i=0;$i<count($obres);$i++){
							echo "<option value=".$obres[$i].">".$obres[$i]."</option>";
						}
				echo "</select></label>
					<label> Fecha: 2017/01/25</label>
					</fieldset>";

				echo "<fieldset>
					<legend>Informacion Asiento</legend>";
				echo "<label> Fila: <select name='fila'>";
					for($i=1;$i<$numF;$i++){
						echo "<option value=".$i.">".$i."</option>";
					}
				echo "</select></label>";

				echo "<label> Columna: <select name='columna'>";
					for($i=1;$i<$numC;$i++){
						echo "<option value=".$i.">".$i."</option>";
					}
				echo "</select></label>";
			?>
			
				<label> Zona: <select name='zona'>
					<option value='Platea'>Platea</option>
					<option value='Palco'>Palco</option>
				</select></label>
				<label> Precio: <select name='preu'>
						<option value='15'>15</option>
				</select></label>
			</fieldset>
			<input type="submit" name="enviar" value="Comprar"/>
		</form>
		
		<?php
			if(isset($_POST['enviar'])){
				$teatre = $_POST['teatre'];
				$nomObra = $_POST['obres'];
				$fila = $_POST['fila'];
				$col = $_POST['columna'];
				$zona = $_POST['zona'];
				$data = '2017/01/25';
				$preu= $_POST['preu'];

				$entrada = new Entrada($nomObra,$fila,$col,$zona,$data,$preu,$teatre);
				$entrada->introduirEntrada();
			}
		?>
	</body>
</HTML>