let dropdownContent = document.querySelector(".dropdown-content");
let dropdown = document.querySelector(".dropdown");

window.addEventListener("click", function(e) {
    if (dropdown.contains(e.target || dropdownContent.style.display === "none")) {
        dropdownContent.style.display = "block";
      } else{
        dropdownContent.style.display = "none";
      }
});

