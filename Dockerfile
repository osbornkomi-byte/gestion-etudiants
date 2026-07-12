# --------------------------------------------------------------
# Dockerfile pour une application PHP pure (Apache + PDO MySQL)
# --------------------------------------------------------------
# Image officielle PHP avec Apache pré‑installé
FROM php:8.2-apache

# 1️⃣ Installer les extensions PDO dont on a besoin
#    - pdo_mysql  → pour parler à MySQL/MariaDB
#    - pdo_pgsql  → au cas où vous voudriez passer à PostgreSQL plus tard
RUN apt-get update && apt-get install -y \
        libzip-dev \
        zip \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql \
    && docker-php-ext-enable pdo pdo_mysql pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# 2️⃣ Copier le code source dans le répertoire servi par Apache
WORKDIR /var/www/html
COPY . .

# 3️⃣ (Optionnel) Activer le module rewrite au cas où vous voudriez
#    utiliser des URLs « propres » plus tard.
RUN a2enmod rewrite

# 4️⃣ Exposer le port sur lequel Apache écoute (par défaut 80)
EXPOSE 80

# 5️⃣ La commande par défaut de l’image officielle php:*-apache
#    lance apache2 en mode foreground → aucun besoin de CMD supplémentaire.