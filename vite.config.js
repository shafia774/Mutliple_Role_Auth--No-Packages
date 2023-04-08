import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //Admin Panel
                    //css
                'resources/admin_panel/vendor/fontawesome-free/css/all.min.css',
                'resources/admin_panel/css/sb-admin-2.min.css',
                    //js
                'resources/admin_panel/vendor/jquery/jquery.min.js',
                'resources/admin_panel/vendor/bootstrap/js/bootstrap.bundle.min.js',
                'resources/admin_panel/vendor/jquery-easing/jquery.easing.min.js',
                'resources/admin_panel/js/sb-admin-2.min.js',
            ],
            refresh: true,
        }),
    ],
});
