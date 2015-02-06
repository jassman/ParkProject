/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $(".dropdown-button").dropdown({
        inDuration: 300,
        outDuration: 225,
        constrain_width: true, // Doçes not change width of dropdown to that of the activator
        hover: false, // Activate on click
        alignment: 'right', // Aligns dropdown to left or right edge (works with constrain_width)
        gutter: 0// Spacing from edge);
    });
});

