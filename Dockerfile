FROM php:8.4-cli

# =========================
# 必要パッケージ
# =========================
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    sqlite3 \
    libsqlite3-dev

# =========================
# PHP拡張
# =========================
RUN docker-php-ext-install pdo pdo_sqlite zip

# =========================
# Composer
# =========================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# =========================
# 作業ディレクトリ
# =========================
WORKDIR /app

# =========================
# ソースコピー
# =========================
COPY . .

# =========================
# 依存インストール
# =========================
RUN composer install --no-dev --optimize-autoloader

# =========================
# .env生成（Render対策）
# =========================
RUN cp .env.example .env || true

# ★Render安定設定
RUN echo "SESSION_DRIVER=cookie" >> .env
RUN echo "CACHE_STORE=array" >> .env
RUN echo "QUEUE_CONNECTION=sync" >> .env

# =========================
# SQLite準備
# =========================
RUN mkdir -p database
RUN touch database/database.sqlite

# =========================
# Laravel初期化
# =========================
RUN php artisan key:generate || true
RUN php artisan config:clear || true
RUN php artisan cache:clear || true

# =========================
# ★ここが重要：全部のテーブル作る
# =========================
RUN php artisan migrate:fresh --force || true

# =========================
# 権限
# =========================
RUN chmod -R 777 storage bootstrap/cache database

# =========================
# ポート
# =========================
EXPOSE 10000

# =========================
# 起動
# =========================
CMD php artisan serve --host=0.0.0.0 --port=10000