<h1>API - MODULO DE COMPRAS</h1>

## Instalación
1. Clonar repositorio.
   ```sh
   git clone https://github.com/KevinGuacanes/API_AplicacionesDistribuidas-.git API-PurchasingModule
   cd API-PurchasingModule
   code .

2. Backend
    ```sh
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate --seed
    php artisan storage:link
    php artisan serve

## A tomar en cuenta Para subir cambios
1. Para crear una nueva rama.
    ```sh
    git branch (nombre de la rama)
    git switch (nombre de la rama)

2. Para subir los cambios a la rama main.
    ```sh
    git switch main
    git pull origin main
    git add . // git add (nombre del archivo)
    git commit -m "Comentario"
    git push origin main

3. Si da conflictos al realizar las migraciones ejecutar estos comandos.
    ```sh
    php artisan migrate:reset 
    php artisan migrate:status
    php artisan migrate:fresh --seed

4. Si la cache del proyecto da fallos ejecutar los siguientes comandos.
    ```sh
    php artisan config:clear
    php artisan route:clear
    php artisan cache:clear

