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

                "resources/scss/portfolio.scss",
                "resources/js/portfolio.js",

                "resources/scss/portfolio-show.scss",
                "resources/js/portfolio-show.js",

                "resources/scss/lk.scss",
                "resources/js/lk.js",

                "resources/scss/good_deeds.show.scss",
                "resources/js/good_deeds.show.js",

                "resources/scss/good_deeds.create.scss",
                "resources/js/good_deeds.create.js",

                "resources/scss/good_deeds.edit.scss",
                "resources/js/good_deeds.edit.js",

                "resources/scss/achievements.show.scss",
                "resources/js/achievements.show.js",

                "resources/scss/achievements.create.scss",
                "resources/js/achievements.create.js",

                "resources/scss/achievements.edit.scss",
                "resources/js/achievements.edit.js",

                "resources/scss/chat.scss",
                "resources/js/chat.js",

                "resources/scss/chat.show.scss",
                "resources/js/chat.show.js",

            ],
            refresh: true,
        }),
    ],
});