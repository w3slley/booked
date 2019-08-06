<?php 
include 'Database.php';
class User extends Database{

	private $name;
	private $user_name;
	private $email;
	private $password;

	



	public function login($email, $password){
			$this->email = $email;
			$this->password = $password;

			$sql = "SELECT * FROM users WHERE email = ? OR user_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->email, $this->email]);

			$result = $stmt->fetch();
			if(isset($result)){
				$dbPassword = $result['password'];
				if(password_verify($this->password, $dbPassword) == True){
					$data = array('id' => $result['id'], 'name' => $result['name'], 'user_name' => $result['user_name'], 'email' => $result['email']); //Created an associative array to use in the login.php file and start session.
						return $data;
				}
			}
			else{
				return False;
			}
		}

		public function signup($name, $user_name, $email, $password){
			$this->name = $name;
			$this->user_name = $user_name;
			$this->email = $email;
			$this->password = $password;
			
			

			$sql = "INSERT INTO users (name, user_name, email, password) VALUES (?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->name, $this->user_name, $this->email, $this->password]);
		}
}
