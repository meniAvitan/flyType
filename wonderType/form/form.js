const sent = document.getElementById("send");
const sendBtn = document.getElementById("sendBtn");

sent.addEventListener("click", ()=>{
    sendBtn.className += "sent-airplane";   
});