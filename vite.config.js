import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '0.0.0.0', // すべてのネットワークインターフェースをリッスン
        // port: 3000, // 使用するポート（デフォルトは3000ですが、必要に応じて変更してください）
        hmr: {
            host: '192.168.0.137', // ここにPCのローカルIPアドレスを指定
        }
      },
    plugins: [
        laravel({
            input: [
                // 'resources/css/app.css',
                'resources/css/chat.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
