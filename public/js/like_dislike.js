// Save Like Or Dislike
$(document).on('click','#saveLikeDislike',function(){
    alert("hi");
    var _post=$(this).data('post');
    var _type=$(this).data('type');
    var vm=$(this);
    // Run Ajax
    $.ajax({
        url:"{{ url('save-likedislike') }}",
        type:"post",
        dataType:'json',
        data:{
            post:_post,
            type:_type,
            _token:"{{ csrf_token() }}"
        },
        beforeSend:function(){
            vm.addClass('disabled');
        },
        success:function(res){
            if(res.bool==true){
                vm.removeClass('disabled').addClass('active');
                vm.removeAttr('id');
                var _prevCount=$("."+_type+"-count").text();
                _prevCount++;
                $("."+_type+"-count").text(_prevCount);
            }
        }   
    });
});
// End