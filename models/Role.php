
<?php
//finished
  class Role {
    // DB Stuff
    private $conn;
    private $table = 'service_role';

    // Properties
    public $id;
    public $tname;
    public $last_edit;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Roles
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        tname,
        last_edit
      FROM
        ' . $this->table . '
      ORDER BY
        last_edit DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Role
  public function read_single(){
    // Create query
    $query = 'SELECT
          id,
          tname,
          last_edit
        FROM
          ' . $this->table . '
      WHERE id = ?
      LIMIT 0,1';

      //Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // set properties
      $this->id = $row['id'];
      $this->tname = $row['tname'];
      $this->last_edit = $row['last_edit'];
      
  }

  // Create Role
  public function create() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      tname = :tname,
      ';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->tname = htmlspecialchars(strip_tags($this->tname));

  // Bind data
  $stmt-> bindParam(':tname', $this->tname);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: .\n", $stmt->error);

  return false;
  }

  // Update Role
  public function update() {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      tname = :tname
      WHERE
      id = :id';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->tname = htmlspecialchars(strip_tags($this->tname));
  $this->id = htmlspecialchars(strip_tags($this->id));

  // Bind data
  $stmt-> bindParam(':tname', $this->tname);
  $stmt-> bindParam(':id', $this->id);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: .\n", $stmt->error);

  return false;
  }

  // Delete Role
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

    // Prepare Statement
    $stmt = $this->conn->prepare($query);

    // clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind Data
    $stmt-> bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: .\n", $stmt->error);

    return false;
    }
  }
