(function() {
  "use strict";

  /**
   * Modal Popup
   */

  document.addEventListener('DOMContentLoaded', function() {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btns = document.getElementsByClassName("myBtn");

    for (var i = 0; i < btns.length; i++) {
      // When the user clicks the button, open the modal
      btns[i].onclick = function() {
        modal.style.display = "block";
      }
    }

    // Get the modal
    var modalIgnite = document.getElementById("myModalIgnite");

    // Get the button that opens the modal
    var btnsIgnite = document.getElementsByClassName("myBtnIgnite");

    for (var i = 0; i < btnsIgnite.length; i++) {
      // When the user clicks the button, open the modal
      btnsIgnite[i].onclick = function() {
        modalIgnite.style.display = "block";
      }
    }


    // Get the modal
    var modalAccelerate = document.getElementById("myModalAccelerate");

    // Get the button that opens the modal
    var btnsAccelerate = document.getElementsByClassName("myBtnAccelerate");

    for (var i = 0; i < btnsAccelerate.length; i++) {
      // When the user clicks the button, open the modal
      btnsAccelerate[i].onclick = function() {
        modalAccelerate.style.display = "block";
      }
    }


    // Get the modal
    var modalEnterprise = document.getElementById("myModalEnterprise");

    // Get the button that opens the modal
    var btnsEnterprise = document.getElementsByClassName("myBtnEnterprise");

    for (var i = 0; i < btnsEnterprise.length; i++) {
      // When the user clicks the button, open the modal
      btnsEnterprise[i].onclick = function() {
        modalEnterprise.style.display = "block";
      }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close"); 
    console.log("deam: "+span);
    for (var i = 0; i < span.length; i++) {
      // When the user clicks the button, open the modal
      span[i].onclick = function() {
        modal.style.display = "none";
        modalIgnite.style.display = "none";
        modalAccelerate.style.display = "none";
        modalEnterprise.style.display = "none";
      }
    }

    /*/ When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
      modalIgnite.style.display = "none";
      modalAccelerate.style.display = "none";
      modalEnterprise.style.display = "none";
    }*/

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal || event.target == modalIgnite || event.target == modalAccelerate || event.target == modalEnterprise ) {
        modal.style.display = "none";
        modalIgnite.style.display = "none";
        modalAccelerate.style.display = "none";
        modalEnterprise.style.display = "none";
      }
    }
  });
})();