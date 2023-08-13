# Talently Challenge

## Configuración

Este repositorio incluye la configuración inicial para este problema, incluyendo los specs. Usa la librería de [Kahlan](http://kahlan.readthedocs.org/en/latest/), que probablemente no has usado. Pero no te preocupes, no hay mucho que aprender. Revisa los specs y entenderás la sintaxis básica en menos de un minuto.

Tu tarea es:

1. Refactorizar el código en la clase `VillaPeruana.php`.
2. Agregar un nuevo typo de elemento, "Café". Las especificaciones para este elemento están comentadas en el archivo `VillaPeruanaScpec.php`.

## Flujo

Debes tener instalado docker en tu computadora para usar nuestros comandos del flujo de trabajo

- Usa el comando `./start` para inicializar el docker
- Usa el comando `./test` para correr los tests
- Usa el comando `./finish` para desactivar el docker

# Reglas

Hola y bienvenido al equipo La Villa Peruana. Como sabes, somos una pequeña posada, con una excelente ubicación en una ciudad importante, administrada por nuestra amigable Allison. También compramos y vendemos los más finos productos. Desafortunadamente, nuestros productos se van desgradando constantemente en calidad conforme se acercan a su fecha de vencimiento. Tenemos un sistema que actualiza nuestro inventario por nosotros. Fue desarrollado por un desarrollador llamado Elmo, quien ha ido en busca de nuevas aventuras.

Queremos agregar una nueva categoría de productos al sistema y para ello necesitamos tu ayuda.

Primero, una introducción a nuestro sistema:

- Todos los productos tienen un SellIn que denota el número de días que se tienen para vender el producto
- Todos los productos tienen un Quality que denota cuán valioso es el producto
- Al final de cada día, nuestro sistema disminuye los ambos valores para cada producto

Bastante simple, ¿verdad? Bueno, acá se pone interesante:

- Cuando la fecha de venta ha pasado, el Quality se degrada dos veces más rápido
- El Quality de un producto nunca es negativo
- Los productos "Pisco Peruano", en realidad, incrementan en Quality mientras más viejos están
- El Quality de un producto nunca es mayor a 50
- Los productos "Tumi", siendo un producto legendario, nunca debe ser vendido o bajaría su Quality
- Los "Tickets VIP", así como "Pisco Peruano", incrementan su Quality conforme su SellIn se acerca a 0, el Quality incrementa en 2 cuando faltan 10 días o menos y en 3 cuando faltan 5 días o menos, pero el Quality disminuye a 0 después del concierto.

Recientemente hemos firmado un contrato con un proveedor de productos de "Café". Esto require una actualización para nuestro sistema:

- Los productos de "Café" se degradan en Quality el doble que los productos normales

Para dejarlo claro, un producto nunca puede incrementar su Quality mayor a 50, sin embargo "Tumi" es un producto legendario y como tal su Quality es 80 y nunca cambia.

# Entregable o Expectativa del reto
- Será indispensable el uso de los principios S.O.L.I.D.
- Organización de código
- Manejo de errores
- Deseable el uso de Domain drive design (usa los conceptos de ddd, aggregates, value objects, domain services, etc)
- La limpieza y legibilidad del código será considerada.
- La eficiencia del código en cuestiones de rendimiento sumarán para esta prueba.
- Al finalizar el reto, enviar el enlace de la solución a carlos@talently.tech con copia a elena.baron@talently.tech y jhorman.tasayco@talently.tech con título "Reto Talently"

# Preguntas de conocimiento en Laravel

1. Qué paquete o estrategia utilizarías para levantar un sistema de administración rápidamente? (Autenticación y CRUDs)

Existen varios ERP que se pueden utilizar para este tipo de sistemas. Entre los más conocidos y open source se encuentra "Laravel Voyager". 
En lo personal no lo he utilizado pero me ha tocado trabajar con otro ERP llamado "Laravel CRUDBooster". Mi experiencia en ese ERP me permitió ver que este tipo de sistemas son de difícil escalado, de baja performance (especialmente en querys) y tienden a llevar a los desarrolladores a la implementación de malas prácticas de código.
Sin embargo, para casos en los que el presupuesto del cliente es bajo y la complejidad de lo que se busca no es alta, puede resultar en una opción que le permita a ambas partes beneficiarse a un bajo costo y con una rápida salida a producción. 


2. Una breve explicación de cómo laravel utiliza la injección de dependencias

Al permitir la inyección de dependencias, Laravel posibilita la utilización de abstracciones en vez de implementaciones. Las implementaciones de este origen son una “caja negra” para las clases que las implementan, reduciendo el acoplamiento entre ambas.
 
A su vez, la inyección de dependencias posibilita un alto grado de cohesión haciendo que las responsabilidades de una clase se modularizen ganando especificidad en las mismas (También conocido como el principio de Single Responsability del patrón SOLID) 

En resumen, la inyección de dependencias facilita la famosa buena práctica de “reducir el acoplamiento y aumentar la cohesión ” permitiendo que las aplicaciones sean escalables, performantes y más fáciles de entender. 



3. En qué casos utilizarías un Query Scope?

He tenido que usar Query Scopes para casos particulares en los que las reglas de negocio requieren lógica muy específica que aplica para todos los casos de una entidad específica. 

Generalmente los datos auto-calculados son casos en el que se aplica esta lógica que permite ahorrar espacio de almacenamiento evitando redundancia de datos y disponibilizando datos que son siempre necesarios. 
Ejemplo simple: En la Base de Datos se guarda la fecha de nacimiento de un usuario y el get de usuarios siempre necesita esa edad al día de la fecha. Para ese caso se puede hacer que la edad sea un dato autocalculado por Query Scopes, sin almacenarlo en DB,  pero siempre estando disponible tanto para los métodos del back como para el front  

Otros casos posibles son el parseo de tipos de datos o reestructuración de información para que la inserción, actualización o búsqueda de datos sea simple para el renderizado del front y el manejo de datos en funciones del back dejando la lógica a los Query Scope. 
Ejemplo simple: Diferencias en el manejo de fechas según los usos horarios del usuario y el servidor en el que se encuentra hosteada la aplicación.


4. Qué convenciones utilizas en la creación e implementación de migraciones?

Si bien la creacion de los archivos propios de la migracion los suelo crear mediante los comandos de consola que disponibiliza Laravel 

Si bien la creación de los archivos propios de la migración los suelo hacer mediante artisan existen algunas prácticas que llevo a cabo a la hora de codear la migración propiamente dicha:

Siempre verificar que la función down() esté completada correctamente. Aunque parezca algo simple, se les suele pasar por alto a algunos devs y es algo que siempre veo en los Code Reviews. 
Ser específicos en el tipo y longitud de datos según el contenido que tendrá la columna (Si por ejemplo una columna va a almacenar hexadecimales de colores limitar la longitud de caracteres para los mínimos necesarios. Si se utilizan decimales ser específicos en cantidad de dígitos según el requerimiento). 
Utilizar borrado lógico y no físico para datos sensibles que puedan ser requeridos valiosos. 
Establecer las relaciones y restricciones entre entidades en las migraciones para asegurar la consistencia de datos y la simplificación del uso de relaciones entre entidades por el back.
Utilizar índices para favorecer el rendimiento de las búsquedas. 

