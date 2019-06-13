$(document).ready(function(){
    $('#transfer').on('click', function(e){
        e.preventDefault()
        var total = $('#count').text();
        console.log(total);
        var cart = $('#cart').find('tr');
        var row = $.map(cart, function(n, i){
            return {
                id: n.children[0].innerText,
                with: n.children[1].innerText,
                fund: n.children[2].innerText
            }
        })
        console.log(row);
        console.log(cart);
        swal({
            title: 'Transfer',
            text: 'Commit to transfer ?'
        })
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type:"GET",
            url:"/transfer/1",
            success:function(data){
                console.log(data)
            },
            error:function(data){
                swal({
                    text: "Sorry, There is a Problem<br>try to Refresh the Page",
                    icon:"error"
                })
            }
        })
    })

    $('a.rmv').on('click', function(e) {
        e.preventDefault()
        var id = this.id
        swal({
            icon: 'warning',
            buttons: ["Cancel", "Yes"],
            dangerMode : true,
            text : 'Delete Business ?'
        }).then(function(isConfirm){
            if(isConfirm){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    type:"DELETE",
                    url: this.href,
                    data: {
                        '_token' : $('meta[name="csrf-token"]').attr('content'),
                        'id' : id
                    },
                    success:function(data){
                        swal("Confirmed : Offer-"+data+" Rejected").then(function(){
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
        })
    })

    $('a.reject').on('click', function(e) {
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
                    url:this.href,
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
    $('a.approve').on('click', function(e) {
        e.preventDefault();
        console.log('uwu');

        var id = this.id;
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
        $.ajax({
            type: "GET",
            url: this.href,
            success:function(data){
                var tr = $('tr#row'+id);
                swal({
                    icon : 'success',
                    title : 'Offer Approved'
                }).then(function(){
                    tr.fadeOut(100, function(){
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
