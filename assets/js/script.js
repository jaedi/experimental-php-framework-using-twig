$(document).ready(function(){
    $(".minimize-table").click(function(){
        let table = $(this).parents().get(3).id;
        $(`#${table} tbody`).toggle();
    
    });
});