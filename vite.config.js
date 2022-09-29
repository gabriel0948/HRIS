import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // 'resources/sass/app.scss',
                // 'resources/js/app.js',
                'resources/assets/vendor/fontawesome-free/css/all.min.css',
                'resources/assets/css/sb-admin-2.min.css',

                'resources/assets/vendor/jquery/jquery.min.js',
                'resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'resources/assets/vendor/jquery-easing/jquery.easing.min.js',
                'resources/assets/vendor/js/sb-admin-2.min.js',
                'resources/assets/js/demo/chart-area-demo.js',
                'resources/assets/js/demo/chart-pie-demo.js',


            ],
            refresh: true,
        }),
    ],


    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
