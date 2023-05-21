import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/accounts.js', 'resources/js/bootstrap.js', 'resources/js/calendar.js', 'resources/js/datetime.js', 'resources/js/nav.js', 'resources/js/table.js'],
            refresh: true,
        }),
    ],
});
