# Mercado-Municipal
Proyecto para Desarrollo Web en Entorno Servidor
# Introducción
Mi proyecto es una aplicación web para un mercado municipal, en el cual te podrás registrar, visualizar los puestos del mercado y el usuario registrado también tendrá control sobre sus datos personales y modificarlos si quisiera, o darse de baja en cualquier momento.
Se podrá obtener información a cerca de los puestos que se encuentren registrados en el mercado, y añadirlos a una lista de favoritos
para tener los que más te gustan.<br>
Para una proxima ampliación, me gustaría que los usuarios puedan añadir sus propios comentarios a cerca de lo que les parece ese puesto en particular y darle una puntuación, también se podrán hacer pedidos para recoger en el puesto y contará con la división de la página por tipo de usuario.<br>
Para poder acceder a la web tenemos este usuario de prueba:<br>
**Usuario: antonio@gmail.com<br>
Contraseña: 12345**<br>
Para poder acceder a la api tienes que estar logueado y con estos parámetros se pueden hacer las diferentes operaciones:<br>
* Api: 'buenasPuedeProbarLaApi'<br>
* Si se pone la dirección con la api-key te devuelve información de todos los puestos: 
http://localhost/mercadoMunicipal/api/read_api.php?apiKey=buenasPuedeProbarLaApi<br>
* Si en cambio pones la dirección de la api con el parámetro de id, nos devuelve información de un puesto concreto: http://localhost/mercadoMunicipal/api/read_api.php?apiKey=buenasPuedeProbarLaApi&id=1<br>
* Y la última operación consulta la información del usuario, si le mandas el parámetro de idUsuario relleno:
http://localhost/mercadoMunicipal/api/read_api.php?apiKey=buenasPuedeProbarLaApi&idUsuario=si<br>
**Por Cintia García Ruiz** <br>
**2º Desarrollo de Aplicaciones Web**<br>

## Página Index
En esta página se puede elegir entre iniciar sesión o registrarse, internamente está oculto el cuadro para iniciar sesión y solo si pulsas iniciar sesión aparece para loguearse:

<img src="capturas/index.png" width="800px"><br>
<img src="capturas/iniciar.png" width="800px"><br>

## Página Registro
Aquí se puede registrar como nuevo usuario cuando entras de nuevas; Si no ponemos una imagen de usuario por defecto se añade una foto de un avatar para que no quede vacia, desde la base de datos se comprueba que el email es unico(añadiendo el campo como clave unica) para que no haya dos iguales registrados ya que la clave primaria es autoincremental y podrían haber insertado dos email iguales:

<img src="capturas/registro.png" width="800px"><br>
<img src="capturas/registro2.png" width="800px"><br>

## Página Inicio
Desde este apartado se pueden visualizar todos los puestos que hay registrados en la base de datos, seleccionar uno en concreto para ver su información o navegar por el menú del navbar, está puesto en ajax que primero se visualicen los primeros 8 puestos y según bajes el scroll aparezcan los demás puestos:

<img src="capturas/inicio.png" width="800px"><br>

## Página Información
En esta página se visualiza la información de un puesto en concreto que se haya seleccionado; la foto del mismo, nombre,teléfono de contacto e información acerca de él. También tenemos dos botones con los que se puede añadir a nuestra página de favoritos o quitar:

<img src="capturas/info.png" width="800px"><br>
<img src="capturas/favoritos.png" width="800px"><br>

* Favoritos
<img src="capturas/pantallaFavorito.png" width="800px"><br>

## Página Perfil
Aquí se visualizan los datos del usuario, y hay dos funciones a realizar, modificación de los datos y baja de usuario.<br>
En el caso de que el usuario se quiera dar de baja aparece una ventana modal para poder confirmar que se quiere dar de baja.
Si se pulsa guardar cambios, hay datos nuevos y no hay problemas en la modificación de los datos aparece un mensaje diciendo que se ha hecho correctamente,o en el caso de que no haya cambios o no se ejecute bien aparece un mensaje de alerta: 

<img src="capturas/perfil.png" width="800px"><br>
<img src="capturas/perfil2.png" width="800px"><br>
<img src="capturas/perfilMensaje.png" width="800px"><br>
<img src="capturas/perfilModalBaja.png" width="800px"><br>

## Base de datos
Modelo Entidad-Relación de mi proyecto , más las tablas y relaciones en la base de datos, en esta segunda se muestran todas las tablas que son necesarias para el proyecto final:

<img src="capturas/E-R.png" width="800px"><br>
<img src="capturas/BaseDatos.png" width="800px"><br>



