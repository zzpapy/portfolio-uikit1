<?php
    
    include 'Contact.class.php';
	
	class ContactManager
	{
		private $db;
		public function __construct($db)
		{
			$this->db = $db;
		}
	
		
		public function findAll($db)
		{
			$query = "SELECT * FROM contact ORDER BY id DESC";

			
			foreach  ($db->query($query) as $row) {
				$list[] = $row;
			}
			return $list;
		}
		public function create ($db,$nom,$prenom,$date,$mail,$tel,$mess)
		{	
			$user = new Contact($this->db);
			$user-> setNom($nom);
			$user-> setPrenom($prenom);
            $user-> setDate($date);
            $user-> setMail($mail);
            $user-> setTel($tel);
            $user-> setMess($mess);
			
			
            $nom = htmlspecialchars(htmlspecialchars($user->getNom()));
			$prenom = htmlspecialchars(htmlspecialchars($user->getPrenom()));
			$date =  htmlspecialchars(htmlspecialchars($user->getDate()));
            $mail = htmlspecialchars(htmlspecialchars($user->getMail()));
            $tel = htmlspecialchars(htmlspecialchars($user->getTel()));
            $mess = htmlspecialchars(htmlspecialchars($user->getMess())); 
            
			$query = $db->prepare("INSERT INTO contact (nom,prenom,date,mail,tel,mess) 
			VALUES ('".$nom."','".$prenom ."','".$date."','".$mail."','".$tel."','".$mess."')");
			 $test=$query->execute(array(
				 "nom" => $nom, 
				 "prenom" => $prenom,
				 "date" => $date,
				 "mail" => $mail,
				 "tel" => $tel,
				 "mess" => $mess
				));			
            return $nom;
            
		}

		
		
	}
?>