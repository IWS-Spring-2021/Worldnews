<!-- <?php
class User{
    private $conn;
    private $table = 'users';

    public $user_id;
    public $username;
    public $email;
    public $password;

    public function __construct($db){
        $this->conn = $db;
    }
    public function read_all_users(){
        $query = "SELECT * FROM " . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function read_user_by_name($uname){
        $query = "SELECT * FROM " . $this->table . " WHERE username='$uname'";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }
    public function read_user_by_email($email){
        $query = "SELECT * FROM " . $this->table . " WHERE email='$email'";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function insert_user($uname, $email, $pass){
        $query =  "INSERT INTO users(username, email, password) VALUES ('$uname', '$email', '$pass')";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    }

    public function get_id_by_name($uname){
        $query = "SELECT user_id FROM " . $this->table . " WHERE username='$uname'";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    
    }

    public function get_user_by_username_password($uname, $pass){
        $query = "SELECT * FROM " . $this->table .  " WHERE username='$uname' AND password='$pass'";
        $stmt = $this->conn->prepare($query);

        $stmt->execute();
        return $stmt;
    
    }
}