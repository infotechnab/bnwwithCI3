<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta charset="utf-8">
<?php if(isset($meta))
{ foreach ($meta as $data) {  $title[] = $data->value; }}
?>        
    <title>.:Dashboard <?php echo $title[1]; ?></title>
</head>
   <link rel="stylesheet" href="<?php echo base_url().'content/bootstrap/css/bootstrap.min.css'; ?>">
  <link rel="stylesheet" href="<?php echo base_url().'content/bootstrap/css/bootstrap-responsive.min.css'; ?>">
   <link rel="stylesheet" href="<?php echo base_url().'content/bnw/styles/loginstyle.css'; ?>">
   <script src="<?php echo base_url().'content/angularjs/angular.min.js'; ?>"></script>
</head>
<div class="container" >
<div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-header" style="padding:30px 20px;">  
         <img  alt="bnw" src="<?php echo base_url()."content/bnw/images/bnw.png"; ?>"/>
        </div>
 <div class="modal-body" style="padding:50px 50px;">

<form ng-app="myApp" ng-controller="validateCtrl" 
name="myForm" novalidate>

<table>
<tr>
<td>
<input type="email" class="form-control" style="padding:21px;" name="email" ng-model="email" required>


</td>
<td>


<input   type="submit"  class=" email btn btn-default btn-lg" value="submit email"
  ng-disabled="incomplete ||
  myForm.email.$dirty && myForm.email.$invalid ">
</td>
</tr>

</table>
<p>
<span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
<span ng-show="myForm.email.$error.required">Email is required.</span>
<span ng-show="myForm.email.$error.email">Invalid email address.</span>
</span>
</p>
{{email}}


</form>
</div>
  <script src="<?php echo base_url().'content/angularjs/forgotpasswordtemplate.js'; ?>"></script>


</script>

</body>
</html>
