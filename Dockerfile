  # --------------------------------------------------------------
  # Dockerfile – application PHP/HTML/CSS avec Apache + PDO
  # --------------------------------------------------------------
  # Base officielle : PHP 8.2 + Apache sur Debian Bullseye
  FROM php:8.2-apache-bullseye

  # 1️⃣ Outils de base pour APT (certificats, gnupg, lsb‑release)
  RUN apt-get update && apt-get install -y --no-install-recommends \
          ca-certificates \
          gnupg \
          lsb-release \
      && rm -rf /var/lib/apt/lists/*

  # 2️⃣ Dépendances système nécessaires aux extensions PDO
  #    - libzip-dev   → pour l’extension zip (souvent utile)
  #    - zip, unzip   → outils de compression/décompression
  #    - libpq-dev    → fichiers d’en‑tête de la bibliothèque PostgreSQL
  RUN apt-get update && apt-get install -y --no-install-recommends \
          libzip-dev \
          zip \
          unzip \
          libpq-dev \
      && rm -rf /var/lib/apt/lists/*

  # 3️⃣ Installation des extensions PHP PDO
  RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql \
      && docker-php-ext-enable pdo_mysql pdo_pgsql \
      && rm -rf /var/lib/apt/lists/*

  # 4️⃣ (Optionnel) Activer le module rewrite d’Apache
  RUN a2enmod rewrite

  # 5️⃣ Copie du code source dans le répertoire servi par Apache
  WORKDIR /var/www/html
  COPY . .

  # 6️⃣ Exposition du port 80 (Apache écoute dessus par défaut)
  EXPOSE 80

  # 7️⃣ La commande par défaut de l’image php:*-apache lance déjà
  #    apache2-foreground → aucun besoin de CMD supplémentaire.