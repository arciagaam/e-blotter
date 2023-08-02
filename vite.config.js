import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/accounts.js',
                'resources/js/alert.js',
                'resources/js/audio_record.js',
                'resources/js/bootstrap.js',
                'resources/js/calendar.js',
                'resources/js/clear.js',
                'resources/js/datetime.js',
                'resources/js/nav.js',
                'resources/js/table.js',
                'resources/js/dynamic_input.js',
                'resources/js/kp_form_select.js',
                'resources/js/modal.js',
                'resources/js/print_window.js',
            ],
            refresh: true,
        }),
    ],
});
