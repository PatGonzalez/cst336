$(document).ready(function(){
 
    $("form").submit(function(event) {
        
        event.preventDefault();
        
        

        //Submits and stores score, retrieves average score
        // Lesson 7
        $.ajax({
            type : "GET",
            url  : "api/getAPI.php",            
            dataType : "json",
            data : {"score" : score },            
            success : function(data){
                console.log(data);
                $("#times").html(data.times);
                $("#average").html(data.average);
                $("#feedback").css("display","block");
                $("#waiting").html("");
                $("input[type='submit']").css("display","");
                
            },
            complete: function(data,status) { //optional, used for debugging purposes
               // alert(status);
            }

        });//AJAX
        
    }); //formSubmit
    
}); //documentReady    