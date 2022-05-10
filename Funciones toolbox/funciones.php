<?php
class Funciones implements JsonSerializable{

    /* CSV */
    public static function GuardarProdutosCSV($productos){
        $retorno = false;
        if (is_array($productos)){
            $archivo = fopen("productos.csv", "w");
            if($archivo != FALSE){
                foreach($productos as $v){
                    $retorno = fputs($archivo, Producto::MostrarProducto($v).PHP_EOL);
                }
                fclose($archivo);
            }
        }
        return $retorno;
    }

    public static function CargarProdutosArrayCSV(){
        $array = [];
        $archivo = fopen("productos.csv", "r");
        if($archivo != FALSE){
            while(!feof($archivo)){
                $mensaje = fgets($archivo);
                if(!empty($mensaje)){
                    $mensaje = str_replace("\n","",$mensaje);
                    $auxArray = explode(", ", $mensaje);
                    $producto = new Producto($auxArray[1], $auxArray[2], $auxArray[3], $auxArray[4], $auxArray[5]);
                    array_push($array, $producto); 
                }
            }
            fclose($archivo);
        }
        return $array;
    }


    /* JSON */
    //Implementa JsonSerializable
    public function jsonSerialize(){
        return get_object_vars($this);
    }

    public static function GuardarUsuariosJSON($arrayUsuarios){
        $retorno = false;
        if(is_array($arrayUsuarios)){
            $archivo = fopen("usuarios.json", "w");
            if($archivo != FALSE){
                $json = json_encode($arrayUsuarios);
                $retorno = fputs($archivo, $json);
                fclose($archivo);
            }
        }
        return $retorno;
    }

    public static function CargarUsuariosArrayJSON(){
        $array = [];
        if(file_exists("./Pizza.json")){
            $archivo = fopen("usuarios.json", "r");
            if($archivo != FALSE){
                $mensaje = fread($archivo, filesize("usuarios.json"));
                $arrayAux = json_decode($mensaje);
                $array = Usuario::GenerarArrayUsuarios($arrayAux);
                fclose($archivo);
            }
        }
        return $array;
    }

    private static function GenerarArrayUsuarios($array){
        $arrayNew = [];
        foreach($array as $v){
            $user = new Usuario($v->_nombre, $v->_apellido, $v->_email, $v->_foto);
            $user->_id = $v->_id;
            $user->_foto = $v->_foto;
            array_push($arrayNew, $user);
        }
        return $arrayNew;
    }

    public static function GuardarFotos($temporal, $destino){
        if(!move_uploaded_file($temporal, $destino)){
            throw new Exception("Error al mover el archivo.");
        }
    }

     /* Funciones */
     private function setRandomId(){
        $this->_id = random_int(0, 10000);
    }
    
    public function Equals($tipo, $sabor){
        if($this->_tipo == $tipo && $this->_sabor == $sabor){
            return true;
        }
        return false;
    }

    public static function GuardarFotos($temporal, $destino){
        if(!move_uploaded_file($temporal, $destino)){
            throw new Exception("Error al mover el archivo.");
        }
    }

    private static function ExistePizza($array, $pizza){
        for($i = 0; $i < count($array); $i++){
            if($array[$i]->Equals($pizza->_tipo, $pizza->_sabor)){
                return $i;
            }
        }
        return -1;
    }

    public static function ManejadorAgregarPizza($pizza){

        try{
            $arrayPizzas = Pizza::CargarPizzaArrayJSON();
            $index = Pizza::ExistePizza($arrayPizzas, $pizza);

            if($index == -1){
                Pizza::AgregarPizzaLista($arrayPizzas, $pizza);
            } else {
                Pizza::ManejadorStock($arrayPizzas, $pizza->_stock, $index);
            }
    
        }catch(Exception $ex){
            throw $ex;
        }

    }

    private static function AgregarPizzaLista($arrayPizzas, $pizza){
        array_push($arrayPizzas, $pizza);
        Pizza::GuardarPizzaJSON($arrayPizzas);
    }

    private static function ManejadorStock($arrayPizzas, $cantidad, $index){
        if($cantidad > 0){
            $arrayPizzas[$index]->_stock += $pizza->_stock;
            Pizza::GuardarPizzaJSON($arrayPizzas);
        } else if ($cantidad < 0) {
            if($arrayPizzas[$index]->_stock >= ($cantidad * -1)){
                $arrayPizzas[$index]->_stock += $pizza->_stock;
                Pizza::GuardarPizzaJSON($arrayPizzas);
            } else {
                throw new Exception ("La cantidad de stock de la pizza es menor a la solicitada");
            }
        }
    }



?>

/* SERVIDOR */
<?php 
    class Servidor{
        
        private PDO $_pdo;

        public function __construct(){
            $conStr = "mysql:host=localhost;dbname=clase_6";  
            $this->_pdo = new PDO($conStr,"root");     
        }

        public function BuscarTodosUsuarios(){
            try {
                $sentencia = $this->_pdo->prepare("SELECT * FROM usuarios"); 
                $sentencia->execute();

                $matriz = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                
                return $matriz;
            } catch(Exception $ex) {
                throw $ex;
            }
        }

        public function AgregarUsuario($usuario){
            try {
                $sentencia = $this->_pdo->prepare("INSERT INTO usuarios (nombre, apellido, clave, mail, localidad, fecha_registro) VALUES (:nombre, :apellido, :clave, :mail, :localidad, :fechaRegistro)"); 
                $sentencia->bindValue(":nombre", $usuario->getNombre(), PDO::PARAM_STR);
                $sentencia->bindValue(":apellido", $usuario->getApellido(), PDO::PARAM_STR);
                $sentencia->bindValue(":clave", $usuario->getClave(), PDO::PARAM_STR);
                $sentencia->bindValue(":mail", $usuario->getMail(), PDO::PARAM_STR);
                $sentencia->bindValue(":localidad", $usuario->getLocalidad(), PDO::PARAM_STR);
                $sentencia->bindValue(":fechaRegistro", $usuario->getFechaRegistro(), PDO::PARAM_STR);
                $sentencia->execute();
            } catch(Exception $ex) {
                throw $ex;
            }
        }

    }
?>

<?php

switch ($method) {
    case 'GET':
        switch (key($_GET)) {
            case 'Cargar':
                include '2021_PP_Pizzeria.Parte_01/PizzaCarga.php';
                break;
            }
        break;
    case 'POST':
        switch (key($_GET)) {
            case 'Consultas':
                include '2021_PP_Pizzeria.Parte_01/PizzaConsultar.php';
                break;
            case 'Venta':
                include '2021_PP_Pizzeria.Parte_02/AltaVenta.php';
                break;
            case 'ConsultasVentas':
                include '2021_PP_Pizzeria.Parte_03/ConsultasVentas.php';
                break;
            case 'Cargar':
                include '2021_PP_Pizzeria.Parte_04/PizzaCarga.php';
                break;
            }
        break;
    case 'PUT':
        include '2021_PP_Pizzeria.Parte_04/ModificarVenta.php';
        break;
    case 'DELETE':
        include '2021_PP_Pizzeria.Parte_04/BorrarVenta.php';
        break;
}

?>

Apuntes SQL
Base de datos SQL -> Visto en 2do

https://youtu.be/JP8RF8uYwU0
-No existe CTRL-Z ni recuperar los datos.
-Puedo tener un campo autoincremental, si es asi no tengo que pasarle un valua ya que es una columna que la maneja el IDE de SQL.
-SQL busca la coincidencia de tipos, puede que haya un error con el nombre de un campo de la tabla y pase igual (ej: M.Nombre (string) C.Apellido (string) pasa igual).

------------------------------------

	Introduccion a manejo de tablas SQL - Seleccion y consulta.

SELECT * FROM (TABLA) | * -> pido todos los campos que voy a mostrar, tambien puedo pedir campos especificos de la tabla poniendo el/los nombres. ej(SELECT nombre, edad, idVeterinario FROM Mascotas)

WHERE (CONDICION) | Filtro los datos que voy a pedirle a la tabla (ej: "campo" > X -> WHERE Mascotas.edad > 4)

AND (CONDICION) -> El AND me permite agregar una condicion (ej: WHERE Mascotas.edad > 4 AND Mascotas.patas > 2).

LIKE (CONDICION) -> Segun como lo apliquemos (ej: WHERE Ciudadanos.nombre LIKE 'Luciano') va a buscar y filtrar lo que coincida en la condicion. | Algunas condiciones para pasarle a nuestro LIKE ['_'(-> cualquier caracter, en esa posicion)] | [%(->muchos, uno, cero: cualquier caracter.)], se pueden combinar.

IN (CONDICION) -> Le pasamos una lista (ej: WHERE Ciudadanos.nombre IN ('Luciano', 'Silvestre', 'Mal')) y nos trae todas las coincidencias que encuentre dentro de la tabla | No podemos aplicar las condiciones del like.

BETWEEN (CONDICION) -> Busca y nos trae la tabla entre dos valores que le pasemos (ej: WHERE Mascotas.edad BETWEEN 3 AND 8) 

ORDER BY (CONDICION) -> Podemos ordenar de manera ASC o DSC (ej: ORDER BY Mascotas.nombre ASC) - (ej2: ORDER BY Mascotas.idVeterinario DESC, Mascotas.nombre ASC)| Por defecto es ASC

MAX - MIN - AVG - GETDATE -> Podemos funciones con las cuales podemos seleccionar el maximo o el minimo de un atributo de la tabla, con el AVG podemos ver el promedio de un atributo, con el GateDate podemos ver la fecha actual (ej: SELECT MAX(Mascotas.edad)) - (ej2: SELECT MIN(Mascotas.edad) - (ej3: SELECT AVG(Mascotas.edad) - (ej4: SELECT *, GETDATE())

------------------------------------

	Relacion entre tablas en SQL

- No hacer un SELECT x, y FROM X, Y, y relacionarlo con el WHERE. El Where FILTRA informacion y va a tardar mucho mas en tiempo, totalmente ineficiente. El INNERJOIN directamente nos va a traer el dato que le pedimos, no filtra dato x dato como el WHERE. 
- Podemos agregar alias cuando hacemos el FROM (ej: FROM Mascotas M | M es el alias) (ej2: FROM Mascotas AS M)
- El INNERJOIN lo podemos pensar como la INTERSECCION de conjuntos.

INNER JOIN -> Nos permite relacionar dos o más tablas, toma la INTERSECCION de esos conjuntos(tablas) relacionadas. (ej: SELECT * FROM Mascotas INNER JOIN Veterinarios ON "Condicion") (El = es el == que se utiliza normalmente).

ON -> La condicion que relaciona las dos tablas. (ej: SELECT Mascotas.nombre, Mascotas.edad, Mascotas.idDuenio, Veterinarios.nombre, Veterinario.apellido FROM Mascotas INNER JOIN Veterinarios ON "Mascotas.idVeterinario = Veterinario.id")

CONCATENACION DE DOS COLUMNAS DE UNA TABLA Y DARLE NOMBRE: Podemos concatenar dos tablas bajo un mismo nombre de la siguiente manera: (ej: SELECT Mascotas.nombre, Mascotas.edad, Mascotas.idDuenio, Veterinarios.nombre + ' ' + Veterinario.apellido AS 'NOMBRE' FROM Mascotas INNER JOIN Veterinarios ON "Mascotas.idVeterinario = Veterinario.id") | Si uso '' el AS no es necesario en teoria.

LEFT JOIN -> Toma la "izquierda" y la interseccion de las tablas que se relacionan (FROM Mascota (izq) LEFT JOIN Veterinarios (derecha))
RIGHT JOIN -> Toma la "derecha" y la interseccion de las tablas que se relacionan (FROM Mascota (izq) RIGHT JOIN Veterinarios (derecha))

------------------------------------

	Modificacion, se lo conoce como comandos/sentencias SQL

- INSERT | Agrego datos
INSERT INTO (Tabla) (Valores tiene la tabla) VALUE (Valores de que se insertan en la tabla) ->  Inserta en la tabla una fila con los datos que le pase en VALUE. Agregando una ',' puedo agregar mas de una instancia. 

INSERT INTO (Tabla) (Valores tiene la tabla) select (Valores a insertar de la otra tabla) FROM (esa "otra tabla" a insertar) -> Inserto los datos de una tabla a mi tabla actual.

DELETE | Elimino datos
DELETE FROM (TABLA) -> Elimino todo. No reinicia los autoincrementables.
DELETE FROM (TABLA) WHERE (Condicion) -> Elimino todo lo que la condicion encuentre

UPDATE | Actualizo datos
UPDATE (TABLA) SET (ALGUN VALOR DE LA TABLA) -> Modifico todo.
UPDATE (TABLA) SET (ALGUN VALOR DE LA TABLA) WHERE (ALGUN VALOR DE LA TABLA) -> Cambio con el set los valores que encuentre con el WHERE, con la "," puedo agregar mas campos a actualizar (ej: UPDATE Mascotas SET nombre = 'Marty' WHERE id = 8)

TRUNCATE TABLE (TABLA) -> Borra y "reinicia" la tabla totalemente de 0.

/*TABLAS*/


//Insert Productos
INSERT INTO producto (codigo_de_barras,nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion) VALUES ('77900361','Westmacott', 'liquido', '33', '15.87', '2021-02-09', '2020-09-26');

/*CONSULTAS*/
//1. Obtener los detalles completos de todos los usuarios, ordenados alfabéticamente.
SELECT nombre FROM usuario ORDER BY usuario.nombre ASC;

//2. Obtener los detalles completos de todos los productos líquidos.
SELECT * FROM producto WHERE producto.tipo='liquido';

//3. Obtener todas las compras en los cuales la cantidad esté entre 6 y 10 inclusive.
SELECT * FROM venta WHERE venta.cantidad > 5 AND venta.cantidad < 11;

//4. Obtener la cantidad total de todos los productos vendidos.
SELECT SUM(cantidad) FROM `venta`;

//5. Mostrar los primeros 3 números de productos que se han enviado.
SELECT * FROM producto INNER JOIN venta ON producto.id = venta.id_producto LIMIT 3

//6. Mostrar los nombres del usuario y los nombres de los productos de cada venta.
SELECT usuario.nombre, producto.nombre FROM usuario INNER JOIN venta on venta.id_usuario = usuario.id INNER JOIN producto on producto.id = venta.id_producto;

//7. Indicar el monto (cantidad * precio) por cada una de las ventas.
SELECT SUM((venta.cantidad)*(producto.precio)) FROM venta INNER JOIN producto on venta.id_producto = producto.id;

//8. Obtener la cantidad total del producto 1003 vendido por el usuario 104.
SELECT SUM(venta.cantidad) from venta WHERE (venta.id_producto = 1003 AND venta.id_usuario = 104);

//9. Obtener todos los números de los productos vendidos por algún usuario de ‘Avellaneda’.
SELECT SUM(venta.cantidad) FROM venta INNER JOIN usuario on venta.id_usuario = usuario.id AND usuario.localidad = "Avellaneda";

//10. Obtener los datos completos de los usuarios  cuyos nombres contengan la letra ‘u’.
SELECT * FROM usuario WHERE usuario.nombre LIKE '%u%';

//11. Traer las ventas entre junio del 2020 y febrero 2021. 
SELECT * FROM venta WHERE venta.fecha_de_venta < '2021-02-01' AND  venta.fecha_de_venta > '2020-06-31';

//12. Obtener los usuarios registrados antes del 2021.
SELECT * FROM usuario WHERE usuario.fecha_de_registro < '2021-01-01';

//13. Agregar el producto llamado ‘Chocolate’, de tipo Sólido y con un precio de 25,35.
INSERT INTO producto (codigo_de_barras,nombre,tipo,stock,precio,fecha_de_creacion,fecha_de_modificacion) VALUES ('77900311','Felfort', 'solido', '20', '25.35', '2019-03-10', '2021-12-30');

//14. Insertar un nuevo usuario
INSERT INTO usuario (nombre, apellido, clave, mail, fecha_de_registro, localidad) VALUES ("Mark", "Grayson", "1204", "MarkGrayson@mail.com", "2022-04-22", "CABA");

//15. Cambiar los precios de los productos de tipo sólido a 66,60
UPDATE producto SET producto.precio = '66.60' WHERE producto.tipo = 'solido';

//16. Cambiar el stock a 0 de todos los productos cuyas cantidades de stock sean menores a 20 inclusive
UPDATE producto SET producto.stock = '0' WHERE producto.stock <= 20;

//17. Eliminar el  producto número 1010.
DELETE FROM producto WHERE producto.id = '1001'; 

//18.Eliminar a todos los usuarios que no han vendido productos.
DELETE FROM usuario WHERE NOT EXISTS(SELECT * FROM venta WHERE venta.id_usuario = usuario.id);


