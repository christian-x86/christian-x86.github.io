function includeHTML() {
  var z, i, elmnt, file, xhttp;
  /* Loop through a collection of all HTML elements: */
  z = document.getElementsByTagName("*");
  for (i = 0; i < z.length; i++) {
    elmnt = z[i];
    /*search for elements with a certain atrribute:*/
    file = elmnt.getAttribute("w3-include-html");
    if (file) {
      /* Make an HTTP request using the attribute value as the file name: */
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4) {
          if (this.status == 200) {elmnt.innerHTML = this.responseText;}
          if (this.status == 404) {elmnt.innerHTML = "Page not found.";}
          /* Remove the attribute, and call this function once more: */
          elmnt.removeAttribute("w3-include-html");
          includeHTML();
        }
      }
      xhttp.open("GET", file, true);
      xhttp.send();
      /* Exit the function: */
      return;
    }
  }
}

includeHTML();

// sidepanel
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("overlay").style.backgroundColor = "rgba(0,0,0,0.6)";
  document.getElementById("overlay").style.zIndex = "1";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("overlay").style.backgroundColor = "rgba(0,0,0,0.0)";
  document.getElementById("overlay").style.zIndex = "-1";  
}

// date
function time() {
  let objectDate = new Date()
  let day = objectDate.getDate();
  let hour = objectDate.getHours();
  let minute = objectDate.getMinutes();
  let second = objectDate.getSeconds();
  
  var final = String(hour)+":"+String(minute)+":"+String(second);
  document.getElementById("time").innerHTML = final;
  var timeout = setTimeout(time, 1000); // recalls the function after 1000 ms
}
time();
