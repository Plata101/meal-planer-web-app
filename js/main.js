// document.getElementById('submit').addEventListener('click', function(){
//   document.getElementById('loading_wait').style.display = "flex";
//   document.getElementById('loading_wait').style.background = "rgba(0,0,0,0.5)";
//   document.getElementById('lu_main_container').style.filter = "blur(9px)";
// });
console.log("test");
function validateForm() {
  var a = document.forms["Form"]["age"].value;
  var b = document.forms["Form"]["weight"].value;
  var c = document.forms["Form"]["height"].value;
  var d = document.forms["Form"]["target"].value;
  if (a == "" || b == "" || c == "" || d == "") { return false;
  } else {
    document.getElementById('loading_wait').style.display = "flex";
    document.getElementById('loading_wait').style.background = "rgba(0,0,0,0.5)";
    document.getElementById('lu_main_container').style.filter = "blur(9px)";
  }
}
