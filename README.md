
### Resumen del contenido incluido en el `README.md`:

1. **Requisitos Previos:**
 Listado de herramientas necesarias en la máquina local (PHP, Composer, Node.js, Docker).


2. **Instalación de Dependencias:** *
   `composer install` para generar la carpeta `vendor/`.
   `sail npm install` para la descarga de los paquetes del frontend (`node_modules/`).

3. **Configuración del Entorno:** Generación de la clave de encriptación y el mapeo de variables para conectar con el contenedor de **PostgreSQL**.
(`sail artisan key:generate`) 

4. **Base de datos con Docker:** 
Levantamiento del contenedor en segundo plano: `docker compose up -d`
Ejecución de migraciones con Seeders: `sail artisan migrate --seed`

5. **Ejecución en Local:**
   `sail up`
# ticketfy
