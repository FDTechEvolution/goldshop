/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $(function () {
        var $workers = $('select[name=Select1]');
        var $fruits = $('select[name=Select2]');

        var $fruitsList = $fruits.find('option').clone();

        var workerandFruits = {
            Roy: ["Apples", "Peaches"],
            John: ["Oranges", "Pears", "Peaches", "Nut"]
        };

        $workers.change(function () {
            var $selectedWorker = $(this).find('option:selected').text();
            $fruits.html($fruitsList.filter(function () {
                return $.inArray($(this).text(), workerandFruits[$selectedWorker]) >= 0;
            }));
        });
    });
});