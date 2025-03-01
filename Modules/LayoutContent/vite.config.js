import {defineConfig} from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin'
import {copyFolderSyncVite} from "vite-plugin-copy-folder"
import path from 'path';


export default defineConfig({
    build: {
        outDir: __dirname + '/resources/assets/dist',
        emptyOutDir: true,
        manifest: "manifest.json",
    },
    plugins: [
        laravel({
            input: [
                __dirname + '/resources/assets/sass/app.scss',
                __dirname + '/resources/assets/js/app.js'
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],        }),
        copyFolderSyncVite(__dirname+ '/resources/assets/', __dirname+ '/../../public/modules/layout_content/'),
    ],
});

//export const paths = [
//    'Modules/LayoutContent/resources/assets/sass/app.scss',
//    'Modules/LayoutContent/resources/assets/js/app.js',
//];
