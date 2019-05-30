<?php 
include 'Database.php';
class User extends Database{

	private $user_name;
	private $email;
	private $password;
	private $first_name;
	private $last_name;
	



	public function login($email, $password){
			$this->email = $email;
			$this->password = $password;

			$sql = "SELECT * FROM users WHERE email = ? or user_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->email, $this->email]);

			$result = $stmt->fetch();
			if(isset($result)){
				$dbPassword = $result['password'];
				if(password_verify($this->password, $dbPassword) == True){
					$data = array('id' => $result['id'], 'first_name' => $result['first_name'], 'last_name'=>$result['last_name'], 'user_name' => $result['user_name'], 'email' => $result['email'], 'birth_date' => $result['birth_date']); //Created an associative array to use in the login.php file and start session.
						return $data;
				}
			}
			else{
				return False;
			}
		}

		public function signup($user_name, $email, $password, $first_name, $last_name){
			$this->user_name = $user_name;
			$this->email = $email;
			$this->password = $password;
			$this->first_name = $first_name;
			$this->last_name = $last_name;
			

			$sql = "INSERT INTO users (first_name, last_name, user_name, email, password) VALUES (?, ?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->first_name, $this->last_name,$this->user_name, $this->email, $this->password]);
		}
}






?>