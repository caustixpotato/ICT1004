/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 *
 */

//Code within this will only run once DOM is ready
// Shorthand for $(document).ready() is $(function(){});
const ID_POPUP = "id_popup";
//const ID_MODAL = "id_modal";
$(document).ready(function ()
{
    $(window).scroll(function () {
        navbarchange();
    });
    //Register event handlers for the thumbnail popup images.
    console.log("JS loaded & Ready!");
});
function navbarchange()
{
    if ($(window).scrollTop() >= 60) {
        $('.navbar').css('background', 'white');
    } else {
        $('.navbar').css('background', 'transparent');
    }
}