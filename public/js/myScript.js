//alert for cofirming execution


$(document).ready(function(){
  
   $('.btnDelete').click(function(e){
 
      if (confirm('Are you Sure?')) {
          
          return true;
      }
   
       e.preventDefault();
   });
   
 });



//this for disappear alert

setTimeout(removeAlert,3000)
function removeAlert(){

   document.querySelector('.alert').remove();
}