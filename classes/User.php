<?php
include 'Database.php';
class User extends Database{


	public function login($username, $password){

			$sql = "SELECT * FROM users WHERE email = ? OR user_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$username, $username]);

			$result = $stmt->fetch();
			if(isset($result)){
				if(password_verify($password, $result['password'])){
					return $result;
				}
			}
			else{
				return False;
			}
		}

		public function signup($name, $user_name, $email, $password){

			$sql = "INSERT INTO users (name, user_name, email, password) VALUES (?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$name, $user_name, $email, $password]);
		}
}
