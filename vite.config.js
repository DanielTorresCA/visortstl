import {
    defineConfig
} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
    server: {
    host: '0.0.0.0',  
    port: 5173,
    strictPort: true,
    watch: { usePolling: true },
    hmr: {
      host: '127.0.0.1',
      protocol: 'ws',
      port: 5173,
    },
  },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/pages/stl-viewer-page.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
