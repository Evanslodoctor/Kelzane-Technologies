
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include necessary files
include 'header.php';
include 'db_connection.php'; // Include your Singleton DB connection
class Database {
    private static $instance = null;
    private $pdo;

    private $host = 'localhost';
    private $dbname = 'kelzane_technologies';
    private $username = 'root';
    private $password = '';

    private function __construct() {
        try {
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->pdo;
    }

    private function __clone() {}

    private function __wakeup() {}
}


try {
    // Get the Singleton instance of the database
    $db = Database::getInstance();
    $pdo = $db->getConnection();

    // Fetch blog data from the database
    $sql = "SELECT * FROM blogs ORDER BY created_at DESC";
    $stmt = $pdo->query($sql);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- Breadcrumbs -->
<div class="breadcrumbs overlay">
    <div class="container">
        <div class="bread-inner">
            <div class="row">
                <div class="col-12">
                    <h2>Our Blog</h2>
                    <ul class="bread-list">
                        <li><a href="index.php">Home</a></li>
                        <li><i class="icofont-simple-right"></i></li>
                        <li class="active">Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<!-- Blog Section -->
<section class="news section">
    <div class="container">
        <div class="row">
            <?php
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="single-news">
                            <div class="news-head">
                                <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                            </div>
                            <div class="news-body">
                                <h4 class="news-title"><a href="blog-single.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['title']); ?></a></h4>
                                <p><?php echo htmlspecialchars(substr($row['content'], 0, 100)); ?>...</p>
                            </div>
                            <div class="news-footer">
                                <ul class="meta">
                                    <li><i class="fa fa-user"></i><?php echo htmlspecialchars($row['author']); ?></li>
                                    <li><i class="fa fa-calendar"></i><?php echo date('d M Y', strtotime($row['created_at'])); ?></li>
                                </ul>
                                <a href="blog-single.php?id=<?php echo $row['id']; ?>" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>No blogs available at the moment.</p>";
            }
            ?>
        </div>
    </div>
</section>
<!-- End Blog Section -->

<?php
include 'footer.php';
?>
