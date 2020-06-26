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

setTimeout(removeAlert,5000)
function removeAlert(){

   document.querySelector('.alert').remove();
}


// $('#commentForm').submit(function(e){
//    e.preventDefault();

// var adminUrl = '{{ url('comment') }}';

// var data = $(this).serialize();

// $.ajaxSetup({
 
//  headers: {'X-CSRF-Token': '{{csrf_token()}}'}
// });


// // this is ajax store function 
  
//  $.ajax({
//      method: 'POST',
//      url: adminUrl ,
//      data: data,
//      dataType: 'JSON',
//      cache: false,
//      success: function(response){
//          if (response.success == "OK") {


//            Swal.fire({
//                type: 'success',
//                text: "comment "+response.status + " successfully",
//            });

//        }

//     },
//  })


// }

