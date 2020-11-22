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
    //Register event handlers for the thumbnail popup images.
    console.log("JS loaded & Ready!");
    $(window).scroll(function () {
        navbarchange();
    });
});
//Changes Navbar Opacity Upon Scroll
function navbarchange()
{
    if ($(window).scrollTop() >= 30) {
        $('.navbar').css('background', 'white');
    } else {
        $('.navbar').css('background', 'transparent');
    }
}