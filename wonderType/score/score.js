
    let statusColor = document.getElementById("status");
    let text_status = document.getElementById("text_status");

    const winColor = () => {
      statusColor.style.color = "#248f24";
      text_status.innerHTML = "ניצחון";
    }

    function loseColor(){
      statusColor.style.color = "#e60000";
      text_status.innerHTML = "הפסד";
    }