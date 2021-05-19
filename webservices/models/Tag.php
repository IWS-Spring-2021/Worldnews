<?php
class Tag
{
  // DB stuff
  private $conn;
  private $table = 'tag';

  // Post Properties
  public $id;
  public $tag;
  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function read_tags()
  {
    // Create query
    $query = 'SELECT tag.id, tag.content AS tag_name FROM tag ORDER BY tag.id';
  
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_single()
  {
    // Create query
    $query = 'SELECT tag.id, tag.content AS tag_name FROM ' . $this->table . ' WHERE id = ?';  // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->id = $row['id'];
    $this->tag = $row['tag_name'];

  }

  public function insert_a_tag()
  {
    // Create query
    $query = "INSERT INTO " . $this->table . " SET content=:tag_name";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->tag = htmlspecialchars(strip_tags($this->tag));

    // bind values
    $stmt->bindParam(":tag_name", $this->tag);

    // $stmt->bindParam(":posted_at", $this->posted_at);

    // execute query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function update_a_tag()
  {
    // Create query
    $query = "UPDATE " . $this->table . " SET content=:tag_name WHERE id=:id";

    // // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->tag = htmlspecialchars(strip_tags($this->tag));
    $this->id = htmlspecialchars(strip_tags($this->id));


    // bind values
    $stmt->bindParam(":tag_name", $this->tag);
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

  public function delete_a_tag()
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return true;
  }

  // Get Posts
  public function read_all()
  {
    // Create query
    $query = 'SELECT tag.id, tag.content FROM tag 
              INNER JOIN tagnews 
              ON tag.id = tagnews.tag_id 
              GROUP BY tag.id';
  
    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_all_tag_of_a_news($id)
  {
    // Create query
    $query = "SELECT `tag`.`id`,`tag`.`content`  FROM `tag` 
          LEFT JOIN `tagnews` ON `tag`.`id` = `tagnews`.`tag_id` 
          RIGHT JOIN `news` ON `news`.`id` = `tagnews`.`news_id` 
          WHERE `news`.`id`=" . $id;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }
}
