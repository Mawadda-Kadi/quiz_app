import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/dropdown.js',
                'resources/js/footer.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        https: {
            key: fs.readFileSync('/workspace/quiz_app/localhost-key.pem'), // Update path
            cert: fs.readFileSync('/workspace/quiz_app/localhost.pem'),   // Update path
        },
        host: '0.0.0.0', // Expose server to Gitpod environment
        port: 5173,
        hmr: {
            host: 'localhost',
        },
    },
});
