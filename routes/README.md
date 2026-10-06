# Rutas del sitio

Apache envia las URLs que no son archivos ni directorios al front controller.
No agregues reglas individuales en `.htaccess`.

- `web.php`: paginas, formularios y acciones. Cada pagina declara su grupo y
  nombre de controlador/modelo. Por ejemplo, `Balances-Auditados` usa
  `Institution/BalancesAuditadosController` y `Institution/BalancesAuditadosModel`.
  Las acciones distintas de `show` se registran en `$actions`.
- `documents.php`: alias publico => archivo relativo a la raiz del proyecto.
  Mantiene los alias antiguos para no romper enlaces existentes.

Ejemplo de documento:

```php
'/balancesAuditados2025' => 'assets/docs/Servicios/balancesAuditados/INFORME DE AUDITORIA DE INST SUPERARSE 2025.pdf',
```

Al imprimir enlaces o recursos usa `url()`, `route()` o `asset()` y escapa el
resultado con `htmlspecialchars()`. En JavaScript usa `APP.url()` o
`APP.asset()`. No imprimas `/MiRuta` directamente: esa URL apunta a la raiz
del dominio, no a la carpeta de la aplicacion.

`APP_URL=auto` y `APP_BASE_PATH=auto` detectan la carpeta de instalacion. Si
el hosting usa un proxy o un alias, configura estos valores en `.env`.
No es necesario fijar `/paginaWeb_Superarse` en el codigo.

Las rutas publicas se obtienen de la URL solicitada. Los enlaces antiguos
`index.php?url=MiRuta` y `public/index.php?url=MiRuta` siguen funcionando.
Un parametro `?url=` en una ruta amigable no cambia la pagina solicitada.

Pruebas sin dependencias adicionales, desde la raiz:

```powershell
php tests\routing.php subdirectory
php tests\routing.php root
php tests\routing.php fallback
php tests\routing.php explicit
php tests\routing.php windows
node --test tests\urls.test.cjs
php tests\routing-http.php http://localhost/paginaWeb_Superarse
```

La ultima prueba usa Apache en funcionamiento y no envia formularios.
