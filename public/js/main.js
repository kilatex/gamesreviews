var url = 'http://proyecto-laravel.com.devel/';

window.addEventListener('load',function(){

    function like(){
        // LIKE BUTTON
        $('i.like').unbind('click').click(function(){
            $(this).addClass('dislike').removeClass('like');
            dislike(); 
            
            $.ajax({

                url: url+'like/'+$(this).data('id'),
                type : 'GET',
                success:  function(response){
                    if(response.like){
                        console.log('Like Successfully');
                    }else{
                        console.log(response);
                    }
                }
            });
        });

    }

    like();
    
    function dislike(){
          // DISLIKE BUTTON
          $('i.dislike').unbind('click').click(function(){
            $(this).addClass('like').removeClass('dislike');
            like();
            

                $.ajax({
                    url: url+'dislike/'+$(this).data('id'),
                    type : 'GET',
                    success:  function(response){
                        if(response.like){
                                    console.log('Dislike Successfully');
                        }else{
                                    console.log(response);
                        }
                }
            });
        });

    }
    dislike();    
 
});