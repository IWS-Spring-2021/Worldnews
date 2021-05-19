<?php
class Category
{
  // DB stuff
  private $conn;
  private $table = 'category';

  // Post Properties
  public $id;
  public $category;
  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get Posts
  public function read_all()
  {
    // Create query
    $query = "SELECT * FROM " . $this->table;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function insert_a_cat()
  {
    // Create query
    $query = "INSERT INTO " . $this->table . " SET category=:cat_name";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->category = htmlspecialchars(strip_tags($this->category));

    // bind values
    $stmt->bindParam(":cat_name", $this->category);

    // $stmt->bindParam(":posted_at", $this->posted_at);

    // execute query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function delete_a_cat()
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return true;
  }

  public function read_cats()
  {
    // Create query
    $query = 'SELECT category.id, category.category AS cat_name FROM category ORDER BY category.id';
  
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_single()
  {
    // Create query
    $query = 'SELECT category.id, category.category AS cat_name FROM ' . $this->table . ' WHERE id = ?';  // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->id = $row['id'];
    $this->category = $row['cat_name'];

  }

  public function update_a_cat()
  {
    // Create query
    $query = "UPDATE " . $this->table . " SET category=:cat_name WHERE id=:id";

    // // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->category = htmlspecialchars(strip_tags($this->category));
    $this->id = htmlspecialchars(strip_tags($this->id));


    // bind values
    $stmt->bindParam(":cat_name", $this->category);
    $stmt->bindParam(":id", $this->id);


    // $stmt->bindParam(":posted_at", $this->posted_at);

    // $query = "UPDATE " . $this->table . " SET title= " . $this->title . ", short_intro= " . $this->short_intro . ", content= " . $this->content . ", author= " . $this->author. ", created_date= " . $this->created_date . ", pic= " . $this->pic . ", cat_id= " . $this->cat_id . " WHERE id=" . $this->id;
    // $stmt = $this->conn->prepare($query);


    // execute query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function read_category_by_news()
  {
    // Create query
    $query = "SELECT * FROM " . $this->table . " WHERE id = ?";

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->id);
    // Execute query
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $this->id = $row['id'];
    $this->category = $row['category'];

  }

}
