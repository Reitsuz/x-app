FROM php:8.4-cli

# 必要パッケージ
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    zip \
    sqlite3 \
    libsqlite3-dev

# PHP拡張
RUN docker-php-ext-install pdo pdo_sqlite zip

# Composer取得
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# 作業ディレクトリ
WORKDIR /app

# ソースコピー
COPY . .

# Laravel依存インストール
RUN composer install --no-dev --optimize-autoloader

# .env生成（Render用簡易）
RUN cp .env.example .env || true

# SQLite準備
RUN mkdir -p database
RUN touch database/database.sqlite

# APP_KEY生成（失敗しても止めない）
RUN php artisan key:generate || true

# キャッシュクリア（安全）
RUN php artisan config:clear || true
RUN php artisan cache:clear || true

# 権限
RUN chmod -R 777 storage bootstrap/cache database

# ポート公開
EXPOSE 10000

# 起動コマンド（Render用）
CMD php artisan serve --host=0.0.0.0 --port=10000