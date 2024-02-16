$(function(){
    $( "#trainingunit-mystartdate" ).datepicker({ changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#trainingunit-startdate", altFormat: "yy-mm-dd" });  
    $( "#trainingunit-myenddate" ).datepicker({ changeYear:true, changeMonth:true, dateFormat:"yy-mm-dd", altField: "#trainingunit-enddate", altFormat: "yy-mm-dd" });  
});