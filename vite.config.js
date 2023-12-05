import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import glob from 'glob';

// Obtén la lista de archivos JS en el directorio resources/js
const jsFiles = glob.sync('resources/js/**/*.js');
const cssFiles = glob.sync('resources/css/**/*.css');


export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                // 'resources/js/app.js',
                ...jsFiles,
                ...cssFiles,
            ],
            refresh: true,
        }),
    ],
});
