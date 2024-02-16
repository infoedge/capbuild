$(function (){
    
    $('#members-nationality').change( function(){
        var id = $(this).val();
        //alert('Country ID: ' + id);
        $.get('index.php?r=projects/members/extract-dialcode',
             { id : id  },
             function(data){
                   var  result = $.parseJSON(data);
                   //alert(result);
                   //alert(data);
                   $('#members-phone').val(result);
        });
    });
    
    $("#theproject-myconstituency").empty();
    $("#theproject-myconstituency").prop("disabled", "disabled");
    $("#theproject-wardno").empty();
    $("#theproject-wardno").prop("disabled", "disabled");
    
    $('#theproject-mycounty').change( function(){
        
        var countyid = $(this).val();
        //alert('I am in the county!'+ countyid);
        $("#theproject-wardno").empty();
        $("#theproject-wardno").prop("disabled", "disabled");
        $.get('index.php?r=projects/theproject/constituency-list',
             { id : countyid  },
             function(data){
                 //alert(data);
                   var  response = $.parseJSON(data);
                  //alert(response);
                   $("#theproject-myconstituency").prop("disabled", false);
                        $("#theproject-myconstituency").empty();
                        var count = response.length;
                        
                        if(count === 0) {
                            $("#theproject-myconstituency").empty();
                            $("#theproject-myconstituency").prop("disabled", "disabled");
                            $("#theproject-myconstituency").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");
                            
                        } else {
                            $("#theproject-myconstituency").append("<option value='"+id+"'>Pick a Constituency...</option>");
                            for(var i = 0; i<count; i++){
                                var id = response[i]['id'];
                                var name = response[i]['constituencyName'];
                                $("#theproject-myconstituency").append("<option value='"+id+"'>"+name+"</option>");
                            }
                        }
               });
    });
    $('#theproject-myconstituency').change( function(){
        
        var constituencyid = $(this).val();
        //alert('I am in the constituency!'+ constituencyid);
        $.get('index.php?r=projects/theproject/ward-list',
             { id : constituencyid  },
             function(data){
                 //alert(data);
                   var  response = $.parseJSON(data);
                  //alert(response);
                   $("#theproject-wardno").prop("disabled", false);
                        $("#theproject-wardno").empty();
                        var count = response.length;

                        if(count === 0) {
                            $("#theproject-wardno").empty();
                            $("#theproject-wardno").prop("disabled", "disabled");
                            $("#theproject-wardno").append("<option value='"+id+"'>Sorry, there are no options available for this selection</option>");
                        } else {
                            $("#theproject-wardno").append("<option value='"+id+"'>Pick a Ward...</option>");
                            for(var i = 0; i<count; i++){
                                var id = response[i]['id'];
                                var name = response[i]['wardName'];
                                $("#theproject-wardno").append("<option value='"+id+"'>"+name+"</option>");
                            }
                        }
               });
    });
});
