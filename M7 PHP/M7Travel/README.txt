#################################################······Pasos para el correcto funcionamiento:······#################################################
1.- Descomprimir la carpeta M7Travel en: C:\inetpub\wwwroot

2.- Ejecutar CrearEstructuraBdd.exe
	2.1.- En el programa que se ha abierto hay que introducir el usuario y password del servicio de bdd.
	2.2.-Una vez introducidos los datos anteriores hacer click en el botón                                     “Crear Estructura”.
	2.3.- Finalmente se abrirá un archivo .php en el navegador, que generara la base de datos con todas sus tablas y los viajes.


#################################################······Mapa de la web:······#################################################
1.- El archivo index.php es un login que solicita un usuario, password, edat, correo, todos obligatorios.
	1.1.- Para acceder como administrador: 
		### usuario y password son ‘admin’###

2.- Después de pasar por index.php llegamos a login.php aquí seremos redireccionados según la edad, si se cumplen los requisitos tendremos acceso a webSite.php.

3.- En webSite.php tendremos una lista de viajes y a un botón que nos permite acceder al carrito, y otro botón que nos permite añadir viajes al carrito.
	3.1.- En caso de acceder como administrador tendremos disponible el botón “Añadir Viaje” (mirar punto 5).

4.- En cart.php podremos ver la lista de viajes seleccionados por el usuario, tendremos un botón para volver a webSite.php y otro para eliminar un viaje del carrito.

5.- [Administrador]En formAddViaje.php encontraremos un formulario en el que después de rellenarlo con todos sus datos podremos introducir un viaje (la ‘id’ del viaje se autogenera).
