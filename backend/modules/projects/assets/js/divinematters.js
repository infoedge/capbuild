$(function(){
    var mylocalchurch = $("#members-localchurch").val();
    if ( mylocalchurch === null ){
        $("#members-myparish").empty();
        $("#members-myparish").prop("disabled", "disabled");
        $("#members-localchurch").empty();
        $("#members-localchurch").prop("disabled", "disabled");
    }
        $('#members-mydeanery').change( function(){
        
            var deaneryid = $(this).val();
            //alert('I am in the county!'+ countyid);
            $("#members-localchurch").empty();
            $("#members-localchurch").prop("disabled", "disabled");
            $.get('index.php?r=projects/members/parish-list',
                 { id : deaneryid  },
                 function(data){
                     //alert(data);
                       var  response = $.parseJSON(data);
                      //alert(response);
                       $("#members-myparish").prop("disabled", false);
                            $("#members-myparish").empty();
                            var count = response.length;

                            if(count === 0) {
                                $("#members-myparish").empty();
                                $("#members-myparish").prop("disabled", "disabled");
                                $("#members-myparish").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");

                            } else {
                                $("#members-myparish").append("<option value='"+id+"'>Pick a Parish...</option>");
                                for(var i = 0; i<count; i++){
                                    var id = response[i]['id'];
                                    var name = response[i]['parishName'];
                                    $("#members-myparish").append("<option value='"+id+"'>"+name+"</option>");
                                }
                            }
                   });
        });
        $('#members-myparish').change( function(){

            var parishid = $(this).val();
            //alert('I am in the constituency!'+ constituencyid);
            $.get('index.php?r=projects/members/localchurch-list',
                 { id : parishid  },
                 function(data){
                     //alert(data);
                       var  response = $.parseJSON(data);
                      //alert(response);
                       $("#members-localchurch").prop("disabled", false);
                            $("#members-localchurch").empty();
                            var count = response.length;

                            if(count === 0) {
                                $("#members-localchurch").empty();
                                $("#members-localchurch").prop("disabled", "disabled");
                                $("#members-localchurch").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");
                            } else {
                                $("#members-localchurch").append("<option value='"+id+"'>Pick a Church...</option>");
                                for(var i = 0; i<count; i++){
                                    var id = response[i]['id'];
                                    var name = response[i]['churchName'];
                                    $("#members-localchurch").append("<option value='"+id+"'>"+name+"</option>");
                                }
                            }
                   });
        });
    
});


