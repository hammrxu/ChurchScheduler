
<?php
//finished
  class Sunday {
    // DB Stuff
    private $conn;
    private $table = 'sundays';

    // Properties
    public $sunday;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Sundays
    public function read() {
      // Create query
      $query = 'SELECT
        sunday
      FROM
        ' . $this->table . '
      ORDER BY
        sunday DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
  }
?>
