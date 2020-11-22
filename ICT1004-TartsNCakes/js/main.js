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
    registerEventHandlers();
    console.log("JS loaded & Ready!");
    $(window).scroll(function () {
        navbarchange();
    });
});

function registerEventHandlers()
{
    var thumbnails = document.getElementsByClassName("img-thumbnail"); //returns an array called thumbnails
    if (thumbnails !== null)
    {
        var counter = 0;
        for (var counter; counter < thumbnails.length; counter += 1)
        {
            var thumbnail = thumbnails[counter];
            thumbnail.addEventListener("click", togglePopup);
        }
    } else
    {
        console.log("No thumbnail images found!");
    }
}

function togglePopup(event)
{
    var popup = document.getElementById(ID_POPUP);
    if (popup === null)
    {
        popup = document.createElement("span");
        popup.id = ID_POPUP;
        popup.setAttribute("class", "img-popup");

        var thumbnail = event.target;
        var small_image = thumbnail.src;
        var big_image = small_image.replace("_small", "_large");

        popup.innerHTML = '<img src=' + big_image + '>';
        thumbnail.insertAdjacentElement("beforebegin", popup);
    } else
    {
        $("#" + ID_POPUP).remove();
    }
}

//Changes Navbar Opacity Upon Scroll
function navbarchange()
{
    if ($(window).scrollTop() >= 50) {
        $('.navbar').css('background', 'rgb(149,56,255)');
    } else {
        $('.navbar').css('background', 'transparent');
    }
}