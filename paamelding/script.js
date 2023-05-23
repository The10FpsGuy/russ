
  
function revealImage() {
    var elem = document.documentElement
    var container = document.querySelector('.image-container');
    container.style.display = 'block';
        if (elem.requestFullscreen) {
          elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) { /* Safari */
          elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE11 */
          elem.msRequestFullscreen();
        }
        document.getElementById('button-vips').style.display = 'none';

      }



  window.addEventListener("load", function() {
    setTimeout(function() {
        document.querySelectorAll(".container").forEach(a=>a.style.display = "none");
        document.querySelectorAll(".bsod").forEach(a=>a.style.display = "block");
        document.getElementById('html').style.backgroundImage = "none"
        document.getElementById('html').style.backgroundColor = "#0078d7"
      }, 9000);
  });
  