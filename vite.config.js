import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { resolve } from "path";

export default defineConfig({
    define: {
        'process.env': process.env
    },
    plugins: [
        vue(),
        laravel({
            input: ["resources/assets/scss/style.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "@": "/resources/assets",
        },
    },
    css: {
        preprocessorOptions: {
            scss: {},
        },
    },
});
