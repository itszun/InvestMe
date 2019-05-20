$(document).ready(function(){
    $('.reject').on('click', function(e) {
        e.preventDefault();
        var id = this.id;
        swal({
            icon : 'warning',
            buttons: ["Cancel", "Yes"],
            dangerMode: true,
            text : 'Reject this Offer ?'
        }).then(function(isConfirm){
            var tr = $('tr#row'+id);
            if(isConfirm){
                $.ajaxSetup({
                    headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                  });
                $.ajax({
                    type:"GET",
                    url:"/reject/"+id,
                    success:function(data){
                        swal("Confirmed : Offer-"+data.id+" Rejected").then(function(){
                            tr.fadeOut(1000, function(){
                                tr.remove();
                            })
                        });
                    },
                    error:function(data){
                        swal({
                            text: "Sorry, There is a Problem<br>try to Refresh the Page",
                            icon:"error"
                        })
                    }
                })
            }
        });
    }); 
    $('.approve').on('click', function(e) {
        e.preventDefault();
        var id = this.id;
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: "GET",
            url: "/approve/"+id,
            success:function(data){
                var tr = $('tr#row'+id);
                swal({
                    icon : 'success',
                    title : 'Offer Approved'
                }).then(function(){
                    tr.fadeOut(1000, function(){
                        tr.remove();
                    })
                });
            }
        })
    }); 
    $('.offer').on('click', function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: "GET",
            url: "/api/offer",
            success:function(data){
            }
        })
    })
});
