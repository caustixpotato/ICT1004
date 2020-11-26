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
    document.getElementById("myBtn1").addEventListener("click", Btn1);
    document.getElementById("myBtn2").addEventListener("click", Btn2);
    document.getElementById("myBtn3").addEventListener("click", Btn3);
    console.log("JS loaded & Ready!");
});

//Singapore
function Btn1() {
  document.getElementById("card-img").src =
  "http://media.marketwire.com/attachments/201404/243661_HelloWorldLogo.jpg";
  document.getElementById("card-title").innerHTML = "Changed";
  document.getElementById("card-body").innerHTML = "Hello JavaScript!";
  document.getElementById("phone-link").href = "https://duckduckgo.com/";
}

//Malaysia
function Btn2() {
  document.getElementById("card-img").src =
  "http://media.marketwire.com/attachments/201404/243661_HelloWorldLogo.jpg";
  document.getElementById("card-title").innerHTML = "Changed2";
  document.getElementById("card-body").innerHTML = "Hello JavaScript!";
  document.getElementById("phone-link").href = "https://duckduckgo.com/";
}

//Taiwan
function Btn3() {
  document.getElementById("card-img").src =
  "http://media.marketwire.com/attachments/201404/243661_HelloWorldLogo.jpg";
  document.getElementById("card-title").innerHTML = "Changed3";
  document.getElementById("card-body").innerHTML = "Hello JavaScript!";
  document.getElementById("phone-link").href = "https://duckduckgo.com/";
}