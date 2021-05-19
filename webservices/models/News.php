<?php
class News
{
  // DB stuff
  private $conn;
  private $table = 'news';

  // Post Properties
  public $id;
  public $title;
  public $short_intro;
  public $created_date;
  public $pic;
  public $author;
  public $content;
  public $cat_id;
  public $tag_id;
  public $category;
  public $max_id;

  // Constructor with DB
  public function __construct($db)
  {
    $this->conn = $db;
  }

  // Get Posts
  public function insert_a_news()
  {
    // Create query
    $query = "INSERT INTO " . $this->table . " SET title=:title, short_intro=:short_intro, content=:content, author=:author, created_date=:created_date, pic=:pic, cat_id=:cat_id";

    // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->short_intro = htmlspecialchars(strip_tags($this->short_intro));
    $this->content = htmlspecialchars(strip_tags($this->content));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->created_date = htmlspecialchars(strip_tags($this->created_date));
    $this->pic = htmlspecialchars(strip_tags($this->pic));
    $this->cat_id = htmlspecialchars(strip_tags($this->cat_id));

    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":short_intro", $this->short_intro);
    $stmt->bindParam(":content", $this->content);
    $stmt->bindParam(":author", $this->author);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":pic", $this->pic);
    $stmt->bindParam(":cat_id", $this->cat_id);

    // $stmt->bindParam(":posted_at", $this->posted_at);

    // execute query
    if ($stmt->execute()) {
      return true;
    }

    return false;
  }

  public function insert_a_tag_news()
  {
    // Create query
    // $query = "INSERT INTO tagnews SET tag_id=:tagId, news_id=:news_id";

    foreach ($this->tag_id as $value){
      $query = "INSERT INTO tagnews SET tagnews.tag_id=:tagId, tagnews.news_id=:news_id";
      $stmt = $this->conn->prepare($query);

      // sanitize
      $value = htmlspecialchars(strip_tags($value));
      $this->id = htmlspecialchars(strip_tags($this->id));
  
      // bind values
      $stmt->bindParam(":tagId", $value);
      $stmt->bindParam(":news_id", $this->id);
      $stmt->execute();
    }

    // prepare query
    // $stmt = $this->conn->prepare($query);

    // // sanitize
    // $this->tag_id = htmlspecialchars(strip_tags($this->tag_id));
    // $this->id = htmlspecialchars(strip_tags($this->id));

    // // bind values
    // $stmt->bindParam(":tag_id", $this->tag_id);
    // $stmt->bindParam(":news_id", $this->id);


    // $stmt->bindParam(":posted_at", $this->posted_at);

    // execute query
    // if ($stmt->execute()) {
    //   return true;
    // }

    // return false;
    return true;
  }

  public function update_a_news()
  {
    // Create query
    $query = "UPDATE " . $this->table . " SET title=:title, short_intro=:short_intro, content=:content, author=:author, created_date=:created_date, pic=:pic, cat_id=:cat_id WHERE id=:id";

    // // prepare query
    $stmt = $this->conn->prepare($query);

    // sanitize
    $this->title = htmlspecialchars(strip_tags($this->title));
    $this->short_intro = htmlspecialchars(strip_tags($this->short_intro));
    $this->content = htmlspecialchars(strip_tags($this->content));
    $this->author = htmlspecialchars(strip_tags($this->author));
    $this->created_date = htmlspecialchars(strip_tags($this->created_date));
    $this->pic = htmlspecialchars(strip_tags($this->pic));
    $this->cat_id = htmlspecialchars(strip_tags($this->cat_id));
    $this->id = htmlspecialchars(strip_tags($this->id));


    // bind values
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":short_intro", $this->short_intro);
    $stmt->bindParam(":content", $this->content);
    $stmt->bindParam(":author", $this->author);
    $stmt->bindParam(":created_date", $this->created_date);
    $stmt->bindParam(":pic", $this->pic);
    $stmt->bindParam(":cat_id", $this->cat_id);
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
  public function delete_a_news()
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return true;
  }

  public function delete_a_news_id_in_tagnews()
  {
    $queryT = "DELETE FROM tagnews WHERE tagnews.news_id = ?";
    $stmtT = $this->conn->prepare($queryT);
    $stmtT->bindParam(1, $this->id);
    $stmtT->execute();
    // if($stmtT->execute()){
    //   return true;
    // }else{
    //   return false;
    return true;

    // $row = $stmtT->fetch(PDO::FETCH_ASSOC);

    // $rowT = $stmtT->fetch(PDO::FETCH_ASSOC);



    // $rowN = $stmtN->fetch(PDO::FETCH_ASSOC);

    // $this->id = $rowT['id'];



  }
  // public function select_tagnews_by_news(){
  //   $query = "SELECT tagnews.tag_id FROM tagnews WHERE tagnews.news_id=:id";
  //   $stmt = $this->conn->prepare($query);
  //   $this->id = htmlspecialchars(strip_tags($this->id));
  //   $stmt->bindParam(":id", $this->id);
  //   $stmt->execute();

  //   return $stmt;
  // }
  public function delete_tagnews()
  {
    $query = "DELETE FROM tagnews WHERE tagnews.news_id = ?";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(1, $this->id);
    $stmt->execute();
    // $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return true;
  }

  // public function insert_tag_news()
  // {
  //   foreach($this->tag_id as $value){
  //     $query = "INSERT tagnews SET tagnews.tag_id=:tagId";

  //     $stmt = $this->conn->prepare($query);
  //     $value = htmlspecialchars(strip_tags($value));
  //     // $this->id = htmlspecialchars(strip_tags($this->id));
  
  //     $stmt->bindParam(":tagId", $value);
  //     // $stmt->bindParam(":id", $this->id);
  
  //     $stmt->execute();
  //   }
    
    
  //   // if ($stmt->execute()) {
  //   //   return true;
  //   // }

  //   return true;
  // }

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


  public function read_page_order_by_id($start, $limit)
  {
    // Create query
    $query = "SELECT * FROM " . $this->table . " LIMIT " . $start .
      ', ' . $limit;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_page($start, $limit)
  {
    // Create query
    $query = "SELECT * FROM " . $this->table . " ORDER BY
    created_date DESC LIMIT " . $start .
      ', ' . $limit;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }
  //Get all news of a category
  // Get Posts
  public function read_all_news_cat($id)
  {
    // Create query
    $query = "SELECT `news`.`id`,`news`.`title`, `news`.`short_intro`, `news`.`author`,`news`.`created_date`,`news`.`pic`
              FROM news
              LEFT JOIN category
              ON news.cat_id = category.id
              WHERE cat_id= " . $id . ";";

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  //Get all news with category name
  // Get Posts
  public function read_all_news_details_page($start, $limit)
  {
    // Create query
    $query = "SELECT `news`.`id`,`news`.`title`, `news`.`short_intro`, `news`.`content`, `news`.`author`,`news`.`created_date`,`news`.`pic`, `category`.`category`, `tag`.`content` As tag_name 
              FROM news
              LEFT JOIN category
              ON news.cat_id = category.id
              RIGHT JOIN tagnews
              ON news.id = tagnews.news_id
              LEFT JOIN tag
              ON tagnews.tag_id = tag.id
              GROUP BY news.id
              ORDER BY created_date DESC LIMIT " . $start . ', ' . $limit;

    // SELECT news.id, news.title, category.category, tag.content from news left join category on news.cat_id = category.id right join tagnews on news.id = tagnews.news_id left join tag on tag.id = tagnews.tag_id group by tagnews.tag_id order by news.id

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_all_news_cat_page($id, $start, $limit)
  {
    // Create query
    $query = "SELECT `news`.`id`,`news`.`title`, `news`.`short_intro`, `news`.`author`,`news`.`created_date`,`news`.`pic` 
              FROM news 
              LEFT JOIN category 
              ON news.cat_id = category.id 
              WHERE cat_id = $id 
              ORDER BY created_date 
              DESC LIMIT " . $start . ', ' . $limit;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }



  public function read_all_news_by_tag($id)
  {
    $query = "SELECT *
              FROM news
              LEFT JOIN tagnews
              ON news.id = tagnews.news_id
              WHERE tag_id= " . $id . ";";

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_all_news_tag_page($id, $start, $limit)
  {
    // Create query
    $query = "SELECT * FROM news 
              LEFT JOIN tagnews
              ON news.id = tagnews.news_id 
              WHERE tag_id = $id 
              ORDER BY created_date 
              DESC LIMIT " . $start . ', ' . $limit;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_all_news_by_title($title)
  {
    $query = "SELECT * 
              FROM news 
              WHERE title LIKE '%" . $title . "%';";

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function read_all_news_title_page($title, $start, $limit)
  {
    // Create query
    $query = "SELECT * FROM news 
              WHERE title LIKE '%" . $title . "%' 
              ORDER BY created_date 
              DESC";

    // $query = "SELECT * FROM news 
    // WHERE title LIKE '%" . $title . "%' 
    // ORDER BY created_date 
    // DESC LIMIT " . $start . ', ' . $limit;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }

  public function get_last_news_id()
  {
    // Create query
    $query = "SELECT MAX(id) AS max_id FROM " . $this->table;

    // $query = "SELECT * FROM news 
    // WHERE title LIKE '%" . $title . "%' 
    // ORDER BY created_date 
    // DESC LIMIT " . $start . ', ' . $limit;

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->max_id = $row['max_id'];
    // Execute query

    return $stmt;
  }

  // SELECT * FROM `news` WHERE title LIKE '%Coronavirus%' ORDER BY 'created_date' DESC LIMIT 0, 5

  // Get Single Post
  public function read_single()
  {
    // Create query
    $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';  // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind ID
    $stmt->bindParam(1, $this->id);

    // Execute query
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // Set properties
    $this->id = $row['id'];
    $this->title = $row['title'];
    $this->content = $row['content'];
    $this->short_intro = $row['short_intro'];
    $this->created_date = $row['created_date'];
    $this->pic = $row['pic'];
    $this->author = $row['author'];
    $this->cat_id = $row['cat_id'];
  }
  public function read_news_related($id)
  {
    // Create query
    $query = "SELECT `news`.`id`,`news`.`title`,`news`.`author`,`news`.`created_date`,`news`.`pic` FROM `news` 
              LEFT JOIN `tagnews` ON `news`.`id` = `tagnews`.`news_id` 
              RIGHT JOIN `tag` ON `tag`.`id` = `tagnews`.`tag_id`
              WHERE `tag`.`id`=" . $id;

    // Prepare statement
    $stmt = $this->conn->prepare($query);
    // Execute query
    $stmt->execute();

    return $stmt;
  }
}
