
<?php
 class User {
    private $connection;
    public function __construct($conn)
    {
        $this->connection=$conn;
    }
    public function login($email, $password) {
        $query = $this->connection->prepare("SELECT * FROM user WHERE email = :email");
        $query->execute([
            "email" => $email,
        ]);
        $user = $query->fetch();
        if ($user && $password == $user["password"]) {
        
            //pass arguments to session in user variable
            $_SESSION["user"]=$user;
            $_SESSION["userid"]=$user["user_id"];
            $_SESSION["role"]=$user["is_admin"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            
            
            return true;
        }
        else {
            return false;
            
        }
    }
    public function register($user_id, $username,$email, $password) {
        
        $emailQuery = "SELECT * FROM user WHERE user_id = :user_id";
        $emailStatement = $this->connection->prepare($emailQuery);
        $emailStatement->execute(['user_id' => $user_id]);

        

        if ($emailStatement->rowCount() > 0 ) {
            // Email or Username already exist, quit registration
            return false;
        }
        $role=0;
        $query = $this->connection->prepare("INSERT INTO user (user_id,username, email,password,is_admin) VALUES (:user_id,:username, :email,:password,$role)");
        
        $query->execute([
            "user_id" =>$user_id,
            "username" => $username,
            "email" => $email,
            "password" => $password,
            
        ]);

        return $this->login($email, $password);
    }
    public function selectAll(){
        $query = $this->connection->prepare("SELECT * FROM election WHERE start_date <= NOW() AND end_date > NOW() ORDER BY start_date ASC");
        
        $query->execute([
        
        ]);
        return $query->fetchAll() ;
    }
    public function selectSome($user_id,$election_id){
        $query = $this->connection->prepare("SELECT * FROM votes WHERE user_id = :user_id and election_id = :election_id");
        
        
        $query->execute([
            "user_id" => $user_id,
            "election_id" => $election_id

        ]);
        return $query->fetchAll() ;
    }
    public function selectCandidates($election_id){
        $query = $this->connection->prepare("SELECT * FROM candidates INNER JOIN programs on programs.candidate_id = candidates.candidate_id WHERE candidates.election_id = :election_id");

        $query->execute([
            
            "election_id" => $election_id

        ]);
        return $query->fetchAll() ;

    }
    public function insertVote($election_id, $user_id, $vote){
        $query = $this->connection->prepare("INSERT INTO votes (election_id, user_id, vote, timestamp) VALUES (:election_id, :user_id, :vote, curdate())");

        $query->execute([
            
            "election_id" => $election_id,
            "user_id" => $user_id,
            "vote" => $vote,


        ]);
        return $query->fetchAll() ;

    }
    public function selectCandidate($election_id,$name){
        $query = $this->connection->prepare("SELECT * FROM candidates WHERE election_id = :election_id AND name = :name");
        $query->execute([
            "election_id" => $election_id,
            "name" =>$name

        
        ]);
        return $query->fetchAll() ;
    }
    public function insertCandidate($election_id,$name,$photo){
        $query = $this->connection->prepare("INSERT INTO Candidates (election_id, name, photo) VALUES (:election_id, :name, :photo)");
        $query->execute([
            "election_id" => $election_id,
            "name" =>$name,
            "photo" =>$photo

        
        ]);
        return $query->fetchAll() ;


    }
    public function insertProgram($candidate_id,$program_title,$program_description,$video,$affiche){
        $query = $this->connection->prepare("INSERT INTO Programs (candidate_id, program_title, program_description, program_video, program_affiche) VALUES ('$candidate_id', '$program_title', '$program_description', '$video', '$affiche')");
        $query->execute([
           
        ]);
        return $query->fetchAll() ;

    }
        
    
    public function selectElId($election_id){
        $query = $this->connection->prepare("SELECT * FROM election WHERE election_id = :election_id");
        
        $query->execute([
            "election_id" => $election_id,

        
        ]);
        return $query->fetchAll() ;

    }
    public function insertElection($title,$description,$end_date){
        $query = $this->connection->prepare("INSERT INTO election (title, description, start_date, end_date) VALUES ('$title', '$description', curdate(), '$end_date')");
        $query->execute([

        
        ]);
        return $query->fetchAll() ;
    }
    
    
}
?>











