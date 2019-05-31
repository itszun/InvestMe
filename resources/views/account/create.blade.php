@extends('layouts.app')

@section('content')

<div class="col-12">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-2">
                    <div class="card-header">
                    Create Information
                    </div>
                    <div class="card-body">
                {{ Form::model($x, ['route' => ['account.store'],
                'class' => 'form-group container p-5', 'method' => 'post', 'id'=>'personal_data']) }}
                    {{Form::token()}}
                    <div class="form-group">
                        {{Form::label('name', "Name")}}
                        {{Form::text('name', $x->name, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('address', "Address")}}
                        {{Form::text('address', $x->address, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('birthdate', "Birthdate")}}
                        {{Form::date('birthdate', $x->birthday, ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                    <table class="table table-bordered" id="dynamic_field">
                    {{Form::label('contact')}}
                    <tr id="row0">
                        <td>
                        <input type="number" name="contact[]" id="contact" class="form-control" required>
                        </td>
                    </tr>
                    </table>
                    </div>
                    <div class="form-group">
                        {{Form::submit('Create', [ 'class' => "btn btn-outline-primary"])}}
                    </div>
                {{ Form::close()}}
                
                    </div>
                    </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      <?php $l = isset($n) ? $n : 1 ?>
      var i= {{$l}};

      $('tr#row0').append('<td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>');

      for(x=1;x<=i;x++){
          $('tr#row'+x).append('<td><button type="button" name="remove" id="'+x+'" class="btn btn-danger btn_remove">X</button></td>');
      };

      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="text" name="contact[]" placeholder="08xx-xxxx-xxxx" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
</script>
@endsection