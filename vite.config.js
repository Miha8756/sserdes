import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                // ---

                "resources/scss/layouts/common.scss",
                "resources/js/layouts/common.js",

                "resources/scss/main.scss",
                "resources/js/main.js",

                "resources/scss/services.scss",
                "resources/js/services.js",

                "resources/scss/portfolio.scss",
                "resources/js/portfolio.js",

                "resources/scss/portfolio-show.scss",
                "resources/js/portfolio-show.js",

                "resources/scss/contacts.scss",
                "resources/js/contacts.js",

                "resources/scss/reviews.scss",
                "resources/js/reviews.js",
            ],
            refresh: true,
        }),
    ],
});