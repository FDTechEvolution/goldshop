/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function generateName() {
    let branch_name = $('#branch_id option:selected').text();
    let type = $('#type option:selected').text();

    let name = branch_name+' - '+type;
    $('#name').val(name);
}


$(document).ready(function () {
   // generateName();
    
    $('#branch_id').on('change', function () {
        generateName();
    });
    
    $('#type').on('change', function () {
        generateName();
    });
});