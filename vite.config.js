import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //Admin Panel

                    //css

                //  Custom fonts for this template
                'resources/admin_panel/vendor/fontawesome-free/css/all.min.css',
                // Custom styles for this template
                'resources/admin_panel/css/sb-admin-2.min.css',
                // Custom styles for table
                'resources/admin_panel/vendor/datatables/dataTables.bootstrap4.min.css',

                    //js

                // Bootstrap core JavaScript 
                'resources/admin_panel/vendor/jquery/jquery.min.js',
                'resources/admin_panel/vendor/bootstrap/js/bootstrap.bundle.min.js',
                // Core plugin JavaScript
                'resources/admin_panel/vendor/jquery-easing/jquery.easing.min.js',
                // Custom scripts for all pages
                'resources/admin_panel/js/sb-admin-2.min.js',
                // Table page level plugins
                'resources/admin_panel/vendor/datatables/jquery.dataTables.min.js',
                'resources/admin_panel/vendor/datatables/dataTables.bootstrap4.min.js',
                // Table page custom scripts
                'resources/admin_panel/js/demo/datatables-demo.js',
            ],
            refresh: true,
        }),
    ],
});
