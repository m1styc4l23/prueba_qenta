# Proyecto Entrevista Qenta

## Instrucciones

### Clonar el Repositorio de git

```bash
git clone https://github.com/m1styc4l/proyecto_api.git
```

### Moverse al directorio del proyecto

```bash
cd proyecto_api
```

### Descargar Dependencias del Proyecto

Como las dependencias del proyecto las maneja **composer** debemos ejecutar el comando:

```bash
composer install
```

### Configurar Entorno

La configuración del entorno se hace en el archivo **.env** pero esé archivo no se puede versionar según las restricciones del archivo **.gitignore**, igualmente en el proyecto hay un archivo de ejemplo  **.env.example** debemos copiarlo con el siguiente comando:

```bash
cp .env.example .env
```

### Generar Clave de Seguridad de la Aplicación

```bash
php artisan key:generate
```
