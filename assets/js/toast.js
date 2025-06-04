/* export function toast(message, type = "info") {
    // Crée l'élément toast
    const toast = document.createElement("div");
    toast.className = `toast toast-${type}`;
    toast.textContent = message;
    // Positionne le toast hors écran à droite
    toast.style.right = "-400px";
    toast.style.opacity = "1";
    // Ajoute dans le container si présent, sinon dans le body
    const container =
        document.querySelector(".toast-container") || document.body;
    container.appendChild(toast);
    // Force le reflow pour activer la transition
    void toast.offsetWidth;
    // Fait glisser le toast à l'écran
    toast.style.right = "30px";
    // Disparition après 5s
    setTimeout(() => {
        toast.style.right = "-400px";
        toast.style.opacity = "0";
        setTimeout(() => {
            if (toast && toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
        }, 500);
    }, 5000);
} */

    console.log('toto');
    