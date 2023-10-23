var notRescueList = document.getElementById('not-rescue-list');
var rescueList = document.getElementById('rescue-list');
var levelA = document.getElementById('level-a');
var levelB = document.getElementById('level-b');
var levelC = document.getElementById('level-c');
var button = document.getElementById('button');

function createNewRescue() {
    var newNotRescue = document.createElement('tr');
    newNotRescue.innerHTML = `
        <td>${document.getElementById('name-input').value}</td>
        <td>${document.getElementById('deparment-input').value}</td>
        <td>${document.getElementById('room-input').value}</td>
        <td>${document.getElementById('have-kids-input').value}</td>
        <td>${document.getElementById('have-old-input').value}</td>
        <td><input onclick="moveToRescue(event)" type="checkbox"></td>
    `;
    notRescueList.appendChild(newNotRescue);
}

function moveToRescue(event) {
    var notRescue = event.target.parentNode.parentNode;
    rescueList.appendChild(notRescue);
}

function showLevelB() {
    levelC.classList.add('hidden');
    levelB.classList.remove('hidden');
    button.classList.add('button-level-b');
}

function hideLevelB() {
    levelB.classList.add('hidden');
    levelC.classList.remove('hidden');
    button.classList.remove('button-level-b');
}

function toggleLevelA(event) {
    if (levelA.classList.contains('hidden')) {
        levelC.classList.add('hidden');
        levelB.classList.add('hidden');
        levelA.classList.remove('hidden');
        event.target.onmouseover = null;
        event.target.onmouseout = null;
        button.classList.remove('button-level-b');
        button.classList.add('button-level-a');
    } else {
        levelC.classList.remove('hidden');
        levelA.classList.add('hidden');
        event.target.onmouseover = showLevelB;
        event.target.onmouseout = hideLevelB;
        button.classList.remove('button-level-a');
    }
}