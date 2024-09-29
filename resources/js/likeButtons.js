export function initializeLikes() {
    const likeButtons = document.querySelectorAll('.like-button');

    likeButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Lógica para manejar el like
            button.classList.toggle('liked');
        });
    });
}
