<?php

 include_once 'Database.php';
 class Claimed_coin {
 	private $db;
 	public function __construct() {
 		 $this->db = new Database();
  }

  public function claimCoins($claimedCoins){
     $sql = "INSERT INTO claimed_coins(email, code, wallet, kudan, distributed) VALUES(:email, :code, :wallet, :kudan, :distributed)";
     $query = $this->db->pdo->prepare($sql);
     $query->bindValue(':email' , $claimedCoins['email']);
     $query->bindValue(':wallet' , $claimedCoins['walletAddress']);
     $query->bindValue(':code' , $claimedCoins['voucherCode']);
     $query->bindValue(':kudan' , $claimedCoins['kudan']);
     $query->bindValue(':distributed' , 1);
     $result = $query->execute();
     if ($result) {
              $msg = "<div class='alert alert-success'><strong> Success ! </strong>   </div>";
     return $msg;
     }else{
              $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
     return $msg;
     }

  }






   public function updateClaimCoin($userID){
     $sql = "UPDATE users_sales SET claimed = :claimed WHERE hex_users_id = :id";

      $query = $this->db->pdo->prepare($sql);
      $query->bindValue(':id' , $userID);
      $query->bindValue(':claimed' , 1);

      $result = $query->execute();
      if ($result) {
               $msg = "<div class='alert alert-success'><strong> Success! Coins are claimed. </strong>   </div>";
      return $msg;
      }else{
               $msg = "<div class='alert alert-danger'><strong> Error ! </strong>   </div>";
      return $msg;
      }
   }


}

?>
