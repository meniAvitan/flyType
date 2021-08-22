

"use strict";

const mainTimer = document.getElementById("mainTimer");
const button = document.getElementById("button");
const lines = document.getElementById("lines");
const airplanePlayer = document.getElementById("airplane1");
const airplaneAI = document.getElementById("airplane2");
const mainScore = document.getElementById("score");
const winnerAudio = document.getElementById("winnerAudio");
const loserAudio = document.getElementById("loserAudio");
const divToType = document.getElementById("word");
const divTyped = document.getElementById("typed");
const spanLevelCount = document.getElementById("levelCount");
const spanWordIndex = document.getElementById("wordIndex");
const countScore = document.getElementById("scoreCount");
const muteSpeechText = document.getElementById("muteSpeech");
const easyLevel = document.getElementById("easyLevel");
const mediumLevel = document.getElementById("mediumLevel");
const hardLevel = document.getElementById("hardLevel");
const levelBtn = document.getElementsByClassName("level");
const volumeInput = document.getElementById("volume");
const restartGame = document.getElementById("restart");
//POP-UP
const gameScoreTitle = document.getElementById("game-score-title");
const gameScore = document.querySelector(".game-score");
const scoreGame = document.getElementById("score_game");
const totalPress = document.getElementById("totalPress");
const successPress = document.getElementById("successPress");
const worngPress = document.getElementById("worngPress");
const totalWords = document.getElementById("totalWords");
const high_score = document.getElementById("highScore");

let timer = 5;
let mainCounter = 0;
let countDownTimer;
let score = 0;
let highScoe = -1;
let currentLevel;
let winStatus;
let levelScore = 0;
let stepPos = 0;
let point = 30;
let pos = 0;
let vocabulary;
let levelCount = 0;
let words;
let wordIndex;
let contentToType;
let contentTyped;
let totalPressCount = 0;
let successPressCount = 0;
let worngPressCount = 0;
let counter;
let c_counter = 0;
let span;
let logCount;


restartGame.addEventListener("click", () =>{
  location.reload();
})

function playWinnerAudio() {
  winnerAudio.play();
}
function playLoserAudio() {
  loserAudio.play();
}

function initGame(json) {
  // json = "easyVocabulary.json"
  fetch(json)
    .then((response) => response.json())
    .then((json) => {
      vocabulary = json;
    })
    .then(() => {
      initLevel();
    });
  return json;
}

function initLevel() {
  spanLevelCount.textContent = ++levelCount;

  words = choice(vocabulary);
  shuffle(words);
  wordIndex = 0;
  initWord();
}

function getHighScoe() {

}
function initWord() {
  if (wordIndex == words.length - 1) {
    initLevel();
    return;
  }

  move();
  countScore.innerHTML = score;
  score++;
  contentToType = words[wordIndex++];
  contentTyped = "";
  spanWordIndex.textContent = wordIndex;
  updateMain();
  let utterance = new SpeechSynthesisUtterance(contentToType);
  utterance.volume = parseFloat(volumeInput.value);
  window.speechSynthesis.speak(utterance);
 
}
function updateMain() {
  removeChildren(divToType);
  removeChildren(divTyped);

  let x_successPressCount = 0;
  for (let i in contentToType) {
    span = document.createElement("span");
    span.textContent = contentToType[i];
    if (i < contentTyped.length) {
      if (contentTyped[i].toLowerCase() == contentToType[i].toLowerCase()) {
        span.className = "correct";
        // successPressCount++;
        // x_successPressCount = successPressCount - i;
      
        
      } else {
        span.className = "incorrect";
        worngPressCount++;
        console.log("worng = " + worngPressCount);
      }
    }

    divToType.appendChild(span);
    span = document.createElement("span");
    span.textContent =
      i < contentTyped.length
        ? contentTyped[i]
        : i == contentTyped.length
        ? "^"
        : " ";
    if (
      i == contentTyped.length &&
      contentTyped.length < contentToType.length
    ) {
      span.className = "cursor";
    }
    divTyped.appendChild(span);
  }
}

// Utility functions

function removeChildren(element) {
  while (element.firstChild) {
    element.removeChild(element.firstChild);
  }
}

function choice(array) {
  let index = Math.floor(Math.random() * array.length);
  return array[index];
}
//shuffle array every load - לערבב את המערך בכל העלאת מילה
function shuffle(array) {
  for (let i = array.length - 1; i > 0; i--) {
    let j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

// function padding(num) {
//   let tens = Math.floor(num / 10);
//   let ones = num - tens * 10;
//   return "" + tens + ones;
// }

// Add event listeners

window.addEventListener("keydown", (event) => {
  totalPressCount++;
  let changed = false;
  if (contentTyped.length > 0 && event.key == "Escape") {
    contentTyped = "";
    changed = true;
  } else if (contentTyped.length > 0 && event.key == "Backspace") {
    contentTyped = contentTyped.slice(0, -1);
    changed = true;
  } else if (
    contentTyped.length < contentToType.length &&
    event.key.length == 1
  ) {
    contentTyped += event.key;
    changed = true;
  }
 
  if (changed) {
    updateMain();
    if (contentTyped.toLowerCase() == contentToType.toLowerCase()) {
      initWord();
      
    }
    
  }
  
});

//move airplane

function move() {
  let interval = setInterval(step, 30);

  //console.log(score);
  function step() {
    if (pos == point) {
      point += 30;
      clearInterval(interval);
    } else {
      pos += 2;
      airplanePlayer.style.marginLeft = pos + "px";
    }
  }
}

button.addEventListener("click", function () {
  if (mainCounter == 0) {
    swal("שגיאה", "בחר רמת קושי", "error");
  } else {
    if (mainCounter == 50) {
      initGame("../DB/GetWordsFromDB.php?pid=1");
      currentLevel = "קל";
      airplaneAI.style.animationDuration = "74s";
      levelScore = 20;
      easyLevel.style.backgroundColor = "tomato";
      easyLevel.style.color = "white";
      easyLevel.style.fontWeight = "bold";
      easyLevel.style.transform = "translateX(10px)";

    } else if (mainCounter == 20) {
      initGame("../DB/GetWordsFromDB.php?pid=2");
      currentLevel = "בינוני";
      airplaneAI.style.animationDuration = "45s";
      levelScore = 10;
      mediumLevel.style.backgroundColor = "tomato";
      mediumLevel.style.fontWeight = "bold";
      mediumLevel.style.color = "white";
      mediumLevel.style.transform = "translateX(10px)";

    } else if (mainCounter == 15) {
      initGame("../DB/GetWordsFromDB.php?pid=3");
      currentLevel = "קשה";
      airplaneAI.style.animationDuration = "30s";
      levelScore = 5;
      hardLevel.style.backgroundColor = "tomato";
      hardLevel.style.fontWeight = "bold";
      hardLevel.style.color = "white";
      hardLevel.style.transform = "translateX(10px)";
    }

    // randWords.sort(()=> {return 0.5- Math.random()})
    // word.innerHTML = randWords[0];

    airplanePlayer.classList = "startAirplane1 airplane1 ";
    airplaneAI.classList = "startAirplane2 airplane2 ";

    setTimeout(() => {
      airplaneAI.classList = "startAirplane2 airplane2 yelloAirplane";
    }, 3000);

    airplanePlayer.style.display = "inline";
    airplaneAI.style.display = "inline";

    button.disabled = true;
    easyLevel.disabled = true;
    mediumLevel.disabled = true;
    hardLevel.disabled = true;
    

    //main count down timer
    setInterval(() => {
      mainTimer.innerHTML = mainCounter;
      mainCounter--;

      if (mainCounter == -1) {
       
        mainCounter = 1000;
        setTimeout(()=>{
          location.reload();
        },10000)
        highScoe  = score;
        if (score > highScoe) {
          highScoe = score;
        }
        if (score > levelScore) {
          console.log("you wone");
          pos += 2;
          airplanePlayer.style.marginLeft = pos + "px";
          gameScore.style.display = '';
          gameScoreTitle.innerHTML = "כל הכבוד!";
          winStatus =  gameScoreTitle.innerHTML;
          gameScoreTitle.style.color = "#248f24"
          gamePressCount();
          playWinnerAudio();

        } else {
          airplaneAI.style.marginLeft = "2000px";
          gameScore.style.display = '';
          gameScoreTitle.innerHTML = "אופס!";
          winStatus = gameScoreTitle.innerHTML;
          gameScoreTitle.style.color = "#e60000"
          gamePressCount();
          playLoserAudio();
        }
      }
    }, 1000);
  }
});


//LEVEL BUTTONS

easyLevel.addEventListener("click", function easy() {
  mainCounter = 50;
  mainTimer.innerHTML = mainCounter;
});
mediumLevel.addEventListener("click", function medium() {
  mainCounter = 20;
  mainTimer.innerHTML = mainCounter;
});
hardLevel.addEventListener("click", function hard() {
  mainCounter = 15;
  mainTimer.innerHTML = mainCounter;
});

let finalScore = 0;
function gamePressCount() {
  finalScore = score - 1;
  totalWords.innerHTML = "סך מילים נכונות - " + finalScore;
  // high_score.innerHTML = "תוצאת שיא - " + highScoe;
  // totalPress.innerHTML = totalPressCount;
  // successPress.innerHTML = c_counter;
  // worngPress.innerHTML = worngPressCount;
}
//RESTART GAME
scoreGame.addEventListener("click", () => {
  gameScore.style.display = "none";

  call_ajax();
});

function call_ajax() {
  /*
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
           // mainScore.innerHTML = xmlhttp.responseText;
            
        }
    }
    xmlhttp.open("GET", "./score.php?score=" + score  + "&level=" + currentLevel + "&highScore=" + highScoe + "&status=" + winStatus, true);
    */
    var data = new FormData();
    data.append('score', score -1);
    data.append('level', currentLevel);
    data.append('highScore', highScoe);
    data.append('status', winStatus);
    
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../score/insertScore.php', true);
    xhr.send(data);

    window.open('../score/score.php', "_blank");
    //xmlhttp.send();
    console.log(score);
}



