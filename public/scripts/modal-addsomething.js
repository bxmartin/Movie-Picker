
    // Grabs all the Elements by their IDs which we had given them
    let modal = document.getElementById("my-modal");

    let btn = document.getElementById("open-btn");

    let button = document.getElementById("ok-btn");

    // We want the modal to open when the Open button is clicked
    btn.onclick = function () {
        modal.style.display = "block";
    }
    // We want the modal to close when the OK button is clicked
    button.onclick = function () {
        modal.style.display = "none";
    }

    // The modal will close when the user clicks anywhere outside the modal
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
