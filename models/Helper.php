
<?php
//finished
  class Helper {
    // DB Stuff
    private $conn;
    private $table = 'service_helper';

    // Properties
    public $id;
    public $tname;
    public $tname_p;
    public $email;
    public $notify;
    public $last_edit;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get helpers
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        tname,
        tname_p,
        email,
        notify,
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

    // Get Single Helper
  public function read_single(){
    // Create query
    $query = 'SELECT
          id,
          tname,
          tname_p,
          email,
          notify,
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
      $this->tname_p = $row['tname_p'];
      $this->email = $row['email'];
      $this->notify = $row['notify'];
      $this->last_edit = $row['last_edit'];
      
  }

  // Create Helper
  public function create() {
    // Create Query
    $query = 'INSERT INTO ' .
      $this->table . '
    SET
      tname = :tname,
      tname_p = :tname_p,
      email = :email,
      notify = :notify
      ';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->tname = htmlspecialchars(strip_tags($this->tname));
  $this->tname_p = htmlspecialchars(strip_tags($this->tname_p));
  $this->email = htmlspecialchars(strip_tags($this->email));
  $this->notify = htmlspecialchars(strip_tags($this->notify));


  // Bind data
  $stmt-> bindParam(':tname', $this->tname);
  $stmt-> bindParam(':tname_p', $this->tname_p);
  $stmt-> bindParam(':email', $this->email);
  $stmt-> bindParam(':notify', $this->notify);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: .\n", $stmt->error);

  return false;
  }

  // Update Helper
  public function update() {
    // Create Query
    $query = 'UPDATE ' .
      $this->table . '
    SET
      tname = :tname,
      tname_p = :tname_p,
      email = :email,
      notify = :notify
      WHERE
      id = :id';

  // Prepare Statement
  $stmt = $this->conn->prepare($query);

  // Clean data
  $this->tname = htmlspecialchars(strip_tags($this->tname));
  $this->tname_p = htmlspecialchars(strip_tags($this->tname_p));
  $this->email = htmlspecialchars(strip_tags($this->email));
  $this->notify = htmlspecialchars(strip_tags($this->notify));
  $this->id = htmlspecialchars(strip_tags($this->id));

  // Bind data
  $stmt-> bindParam(':tname', $this->tname);
  $stmt-> bindParam(':tname_p', $this->tname_p);
  $stmt-> bindParam(':email', $this->email);
  $stmt-> bindParam(':notify', $this->notify);
  $stmt-> bindParam(':id', $this->id);

  // Execute query
  if($stmt->execute()) {
    return true;
  }

  // Print error if something goes wrong
  printf("Error: .\n", $stmt->error);

  return false;
  }

  // Delete Helper
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
