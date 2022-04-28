$(document).ready(function(){

$('#selectAllChecks').click(function(event){
    if(!this.cheched){
        $('.checkboxes').each(function(){
            this.checked = true;
        })
    }})

});