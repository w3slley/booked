<?php 
include 'Database.php';
class User extends Database{

	private $name;
	private $email;
	private $password;

	



	public function login($email, $password){
			$this->email = $email;
			$this->password = $password;

			$sql = "SELECT * FROM users WHERE email = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->email]);

			$result = $stmt->fetch();
			if(isset($result)){
				$dbPassword = $result['password'];
				if(password_verify($this->password, $dbPassword) == True){
					$data = array('id' => $result['id'], 'name' => $result['name'], 'email' => $result['email']); //Created an associative array to use in the login.php file and start session.
						return $data;
				}
			}
			else{
				return False;
			}
		}

		public function signup($name, $email, $password){
			$this->name = $name;
			$this->email = $email;
			$this->password = $password;
			
			

			$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->name, $this->email, $this->password]);
		}
}






?>