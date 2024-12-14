// Changer le contraste
document.getElementById('toggle-contrast').addEventListener('click', () => {
    document.body.classList.toggle('high-contrast');
});

// Lecteur d'écran simple
function readText(text) {
    const utterance = new SpeechSynthesisUtterance(text);
    window.speechSynthesis.speak(utterance);
}

document.querySelectorAll('.read-aloud').forEach(button => {
    button.addEventListener('click', () => {
        const text = button.previousElementSibling.innerText;
        readText(text);
    });
});
