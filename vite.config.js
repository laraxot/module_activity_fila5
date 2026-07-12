import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
  process.env = { ...process.env, ...loadEnv(mode, '../../') };
  return {
        build: {
            outDir: '../../public/build-activity',
            emptyOutDir: true,
            manifest: true,
        },
        plugins: [
            laravel(
                {
                    publicDirectory: '../../public',
                    buildDirectory: 'build-activity',
                    input: [
                        __dirname + '/resources/assets/sass/app.scss',
                        __dirname + '/resources/assets/js/app.js'
                    ],
                    refresh: true,
                }
            ),
        ],
    }
  }
);
