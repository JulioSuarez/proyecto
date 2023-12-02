import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import glob from 'glob';

// Obtén la lista de archivos JS en el directorio resources/js
// const jsFiles = glob.sync('resources/js/**/*.js');


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/socket_client.js',
                'resources/js/streamjsxd/en-vivo.js',
                // ...jsFiles,
            ],
            refresh: true,
        }),
    ],
});
