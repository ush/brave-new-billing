<?php  
namespace App\Entity;  

use Doctrine\ORM\Mapping as ORM;  
/** 
   * @ORM\Entity 
   * @ORM\Table(name = "payments") 
*/ 
class Payment { 
   /** 
      * @ORM\Column(type = "integer") 
      * @ORM\Id 
      * @ORM\GeneratedValue(strategy = "AUTO") 
   */ 
   public $id;
  
   /** 
      * @ORM\Column(type = "string") 
   */ 
   public $uuid;

   /** 
      * @ORM\Column(type = "string") 
   */ 
   public $sum;  
   
   /** 
     * @ORM\Column(type = "string") 
     */ 
   public $spec;
}