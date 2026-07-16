# Instrucciones de desarrollo

## Cada vez que hagas cambios y quieras ver el resultado:

### Opción A - Desarrollo activo (recomendada mientras codificas):
Abre DOS terminales al mismo tiempo:
- Terminal 1: php artisan serve
- Terminal 2: npm run dev
Con npm run dev activo, los cambios de CSS/JS se reflejan
automáticamente sin necesidad de recompilar.

### Opción B - Solo revisar (una sola terminal):
npm run build
php artisan serve
Usar esta opción antes de hacer commit o cuando no se está
editando CSS/JS activamente.

## NUNCA hacer solo php artisan serve sin haber corrido antes
npm run build o npm run dev, o el CSS no va a cargar.
