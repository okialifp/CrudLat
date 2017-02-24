<?php 
    class User
    {

        private $db; 
        private $error; 
        
        function __prepare($conn)
        {
            $this->db = $conn;

            
            session_start();
        }

       
        public function register($nama, $email, $password)
        {
            try
            {
                
                $hashPasswd = password_hash($password, PASSWORD_DEFAULT);

                
                $query = $this->db->prepare("INSERT INTO login(nama, email, password) VALUES(:nama, :email, :pass)");
                $query->bindParam(":nama", $nama);
                $query->bindParam(":email", $email);
                $query->bindParam(":pass", $hashPasswd);
                $query->execute();

                return true;
            }catch(PDOException $e){
                
                if($e->errorInfo[0] == 23000){
                    
                    $this->error = "Email sudah digunakan!";
                    return false;
                }else{
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        public function login($email, $password)
        {
            try
            {
                
                $query = $this->db->prepare("SELECT * FROM login WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();
                $data = $query->fetch();

               
                if($query->rowCount() > 0){
                   
                    if(password_verify($password, $data['password'])){
                        $_SESSION['user_session'] = $data['id'];
                        return true;
                    }else{
                        $this->error = "Email atau Password Salah";
                        return false;
                    }
                }else{
                    $this->error = "Email atau Password Salah";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

       
        public function isLoggedIn(){
            
            if(isset($_SESSION['user_session']))
            {
                return true;
            }
        }

        
        public function getUser(){
          
            if(!$this->isLoggedIn()){
                return false;
            }

            try {
                
                $query = $this->db->prepare("SELECT * FROM login WHERE id = :id");
                $query->bindParam(":id", $_SESSION['user_session']);
                $query->execute();
                return $query->fetch();
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

       
        public function logout(){
           
            session_destroy();
            
            unset($_SESSION['user_session']);
            return true;
        }

       
        public function getLastError(){
            return $this->error;
        }
    }

?>
