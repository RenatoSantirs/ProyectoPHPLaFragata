<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">

		<?php

		if ($_SESSION["perfil"] == "Administrador") {

			echo'<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>
		
			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>';
		}

		if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Encargado" ){

			echo'<li>

				<a href="categorias">

					<i class="fa fa-th"></i>
					<span>Categorías</span>

				</a>

			</li>

			<li>

				<a href="productos">

					<i class="fa fa-product-hunt"></i>
					<span>Productos</span>

				</a>

			</li>';

		}

		if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Encargado" )  {

			echo'<li>

				<a href="empleados">

					<i class="fa fa-users"></i>
					<span>Empleados</span>

				</a>

			</li>';
		}

		if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Encargado" )  {

			echo '<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>
					
					<span>Ordenes</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">
					
					<li>

						<a href="ordenes">
							
							<i class="fa fa-circle-o"></i>
							<span>Administrar ordenes</span>

						</a>

					</li>

					<li>

						<a href="crear-orden">
							
							<i class="fa fa-circle-o"></i>
							<span>Crear orden</span>

						</a>

					</li>';

		

		if ($_SESSION["perfil"] == "Administrador"){

			echo '<li>

						<a href="reportes">
							
							<i class="fa fa-circle-o"></i>
							<span>Reporte de ordenes</span>

						</a>

					</li>';
		}
		
		
				echo'</ul>

			</li>';
	}

	?>
		</ul>

	 </section>

</aside>