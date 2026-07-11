 <?php
  // db.php – configuration dynamique (Render PostgreSQL ou locale)

  if (getenv('DATABASE_URL')) {
      // ---------- Render fournit DATABASE_URL sous la forme ----------
      // postgres://user:pass@host:port/dbname
      $url = parse_url(getenv('DATABASE_URL'));

      $host     = $url['host'];
      $port     = $url['port'] ?? 5432;
      $database = ltrim($url['path'], '/');   // enlever le '/' initial
      $username = $url['user'];
      $password = $url['pass'];
      $driver   = 'pgsql';                    // PDO driver pour PostgreSQL
  } else {
      // ---------- Fallback pour le développement local ----------
      $host     = 'localhost';
      $port     = '3306';
      $database = 'gestion_etudiants';   // à adapter si besoin
      $username = 'root';                // ou votre user local
      $password = '';                    // mot de passe local
      $driver   = 'mysql';               // PDO driver pour MySQL
  }

  $charset = 'utf8mb4';

  if ($driver === 'pgsql') {
      $dsn = sprintf(
          'pgsql:host=%s;port=%d;dbname=%s;charset=%s',
          $host,
          (int)$port,
          $database,
          $charset
      );
  } else {
      $dsn = sprintf(
          'mysql:host=%s;port=%d;dbname=%s;charset=%s',
          $host,
          (int)$port,
          $database,
          $charset
      );
  }

  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  try {
      $pdo = new PDO($dsn, $username, $password, $options);
  } catch (\PDOException $e) {
      // En production on évite d’afficher le trace complet ;
      // on renvoie une réponse 500 générique.
      http_response_code(500);
      echo 'Erreur de connexion à la base de données : ' . $e->getMessage();
      exit;
  }