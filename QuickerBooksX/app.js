$("#addSkill").click(function(e){
    e.preventDefault();
    var new_skiller = $("#skiller").clone();
    new_skiller.attr("id", "skiller-"+$(".row").length);
    new_skiller.insertAfter(".row:last");
});

function addDebit(){
    var thing = $('#debitedOne').clone();
    $('.divID').append(thing);
}