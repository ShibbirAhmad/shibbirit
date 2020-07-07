@extends('backend.master')


@push('css')


    
@endpush



@section('content')


 
<div class="row ">
    <div class="col-md-6 col-sm-6">
        <div class="card   ">
            <div class="card-header text-center"><h6 class="card-title">Message</h6></div>
            <div class="card-body ">
                <form class="form" >
              
                    <div class="col-md-12">
                         
                           <label for="from">From : </label> <input class="form-control" type="email" value="{{ $client->email}}" >
                  
                            <label for="from">Name : </label> <input  class="form-control" type="text" value="{{$client->name}}" >
                            
                            <label for="from">Subject : </label> <input  class="form-control" type="text" value="{{$client->subject}}" >
                  
                            <label for="from">Message : </label>  <textarea   class="form-control" rows="10">{{$client->message }}</textarea>
        
        
                      </div>

                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="card   ">
            <div class="card-header text-center"><h6 class="card-title">Message Reply Here</h6></div>
            <div class="card-body ">
                <form class="form" action="" id="message_reply_form">
              
                    <div class="col-md-12">
                            
                           <input type="hidden" name="id" value="{{$client->id}}" >

                           <label for="from">To : </label> <input name="client_email" class="form-control" type="email" value="{{ $client->email}}" >
                          
                           <label for="from">From : </label> <input name="admin_email" class="form-control" type="email" value="{{ Auth::user()->email}}" >
                  
                            <label for="from">Subject : </label> <input name="subject" class="form-control" type="text" value="" >
                  
                            <label for="from">Message : </label>  <textarea name="message_body"  class="form-control" rows="8"></textarea>
        
                             <input class="btn btn-lg btn-info float-right mt-2" type="submit" value="Send Reply">
                      </div>

                </form>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>


{{-- email reply modal --}}


<div class="modal fade" id="reply_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">message Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form" action="" id="message_reply_form">
              
            <div class="col-md-12">
               
                    <label for="to"> To : </label> <input name="email" class="form-control"  type="email" value="" >
             
  
                    <label for="from">From : </label> <input name="admin_email" class="form-control" type="email" value="" >
          

                    <label for="from">Subject : </label> <input name="subject" class="form-control" type="text" value="" >
          
                    <label for="from">Message : </label>  <textarea name="message_body"  class="form-control" rows="10"></textarea>


              </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info ">Push Reply </button>
          
        </form>
        </div>
      </div>
    </div>
  </div>

  {{-- modal end   --}}






@endsection



@section('script')

      
<script>

    $(function(){
       
     
    //this is message reply function
      $('#message_reply_form').on('submit',function messageReply(event) {
         event.preventDefault()
   
         $.ajaxSetup({
              
              headers: {'X-CSRF-Token': '{{csrf_token()}}'}
          });


        var data = $(this).serialize() ;
        var dataUrl = '{{url('admin/client/message/reply')}}' ;

         
           $.ajax({

               url      : dataUrl,
               method   : 'POST' ,
               data     : data ,
               dataType : 'JSON',
               cache    : false ,

               success : function(response){

                if (response.success == "OK") {
                    console.log(response)
                    Swal.fire({
                        type: 'success',
                        text: "message "+response.status + " successfully",
                    });

                    $('input').val(null)
                    $('textarea').val(null)

                    }else{

                    Swal.fire({
                            type: 'error',
                            title: '<P style="color: red;">Oops...<p>',
                            text: response.errors,
                            footer: '<b> Something Wrong</b>'
                        });


                    }
                   
               },

               error : function(error){
                  
                     console.log(error)
               }


           })
    
              })

    
           });
    
    
     </script>
    
@endsection