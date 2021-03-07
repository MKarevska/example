<?php include (ROOT.'/view/layouts/header.php');
if(!$msg==NULL){
if($msg){?>
<div class="container-fluid">
    <div class="alert alert-success"><?php echo 'Съобщението е изпратено успешно.';?></div>
</div><?php }else{?>
        <div class="container-fluid">
<div class="alert alert-warning"><?php echo 'Съобщението не е изпратено';?></div><?php }}?>
    
  
   
 <div class="row">
     <div class="col-sm-7">
        <img class="img-responsive" src="<?php echo Keramika::Image($productsItem['id']);?>" />
     </div>
    <div class="col-sm-5">
        <div class="w3-container ">
               
      <h4><?php echo $productsItem['title'];?></h4>
      <p>продуктов номер: <?php echo $productsItem['id'];?></p>
      <p>дата: <?php echo $productsItem['date'];?></p>
      <p> <?php echo $productsItem['content'];?></p>
      <p>цена: <?php echo $productsItem['cena'];?></p>
         
          <button name="submit" id="submit" onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green">Запитване</button>
     </div>
 </div>
 

<!--modal-->
<div id="id01" class="w3-modal ">
    <div class="w3-modal-content  w3-animate-top w3-card-4" style="width: 650px">
      <header class="w3-container  w3-flat-emerald"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-large w3-display-topright">&times;</span>
        <h3>Направи запитване</h3>
        
        
      </header>
        
    <form ng-app="myApp" ng-controller="validateCtrl" name="myForm" novalidate class="w3-container w3-padding-16 w3-center w3-flat-clouds" action="" method="post">
    <label for="name" class="w3-left ">Име:</label>
    <input class="w3-input w3-border w3-animate-input" style="width:400px" name="name"  type="text"  ng-model="name" required>
     <span style="color:red" ng-show="myForm.name.$dirty && myForm.name.$invalid">
     <span ng-show="myForm.name.$error.required">Името е задължително</span>
     </span>
    <label for="email" class="w3-left">Email:</label>
    <input type="email" name="email" class="w3-input w3-border w3-animate-input" style="width:400px"  id="email" ng-model="email" required>
    <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
  <span ng-show="myForm.email.$error.required">Email е задължителен</span>
  <span ng-show="myForm.email.$error.email">Невалиден email адрес.</span>
  </span>
    
    <textarea class="w3-input "  name="content" rows="7" ng-model="content" required ></textarea>
    <span style="color:red" ng-show="myForm.content.$dirty && myForm.content.$invalid">
     <span ng-show="myForm.content.$error.required">Напиши съобшение</span>
    </span>
    <div class="w3-panel">
       <button name="send" id="send"  class="w3-button  w3-right w3-flat-emerald " ng-disabled="myForm.name.$dirty && myForm.name.$invalid ||
  myForm.email.$dirty && myForm.email.$invalid||myForm.content.$dirty && myForm.content.$invalid">Изпрати</button></div>
    </form>
<script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
  $scope.name = 'Вашето име';
  $scope.content = 'Съобщение.......';
  $scope.email = 'email';
});
</script>
    </div>
</div>
</div>



 <?php 
 
 include (ROOT.'/view/layouts/footer.php'); 
    



  
