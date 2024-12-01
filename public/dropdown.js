document.addEventListener("DOMContentLoaded", function () {
    var myDropdown = document.getElementById("my-dropdown");
    var dropdownTrigger = document.getElementById("dropdown-trigger");
    var dropdownMenu = document.getElementById("dropdown-menu");

    dropdownTrigger.addEventListener("mouseenter", function () {
        myDropdown.classList.add("active");
        dropdownTrigger.classList.add("active");
        dropdownMenu.classList.add("active");
    });

    dropdownTrigger.addEventListener("click", function () {
        myDropdown.classList.toggle("active");
        dropdownTrigger.classList.toggle("active");
        dropdownMenu.classList.toggle("active");
    });

    document.addEventListener("click", function (event) {
        if (
            !myDropdown.contains(event.target) &&
            !dropdownTrigger.contains(event.target) &&
            !dropdownMenu.contains(event.target)
        ) {
            myDropdown.classList.remove("active");
            dropdownTrigger.classList.remove("active");
            dropdownMenu.classList.remove("active");
        }
    });
});
