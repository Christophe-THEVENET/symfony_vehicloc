import { Controller } from "@hotwired/stimulus";

export default class extends Controller {
    static targets = ["result"];
    static values = {
        url: String,
        message: String,
        error: Boolean,
    };

    connect() {
        // Affiche le toast si un message est présent dans le sessionStorage
        const toastSession = sessionStorage.getItem("toast");
        if (toastSession) {
            setTimeout(() => {
                this.showToast(toastSession);
                sessionStorage.removeItem("toast");
            }, 200);
        } 

    }

    async trigger(event) {

        // pour ne pas envoyer le formulaire par la méthode claqsique
        event?.preventDefault();
        try {
            const response = await fetch(this.urlValue, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
                body:
                    this.element.tagName === "FORM"
                        ? new FormData(this.element)
                        : undefined,
            });

            const data = await response.json();

            if (data.status === "ok") {
                // si il y a une redirection
                if (data.redirectUrl) {
                    // Stocke le message dans le sessionStorage puis redirige
                   sessionStorage.setItem(
                        "toast",
                        data.message || "Action réussie"
                    ); 
                    window.location.href = data.redirectUrl;
                    return;
                }
                this.showToast(data.message || "Action réussie");
                // Supprimer la carte voiture du DOM si suppression
                this.element.closest("article")?.remove();
            } else {
                this.showToast(data.message || "Erreur", true);
            }
        } catch (e) {
            this.showToast("Erreur technique", true);
        }
       /*  if (this.hasResultTarget) {
            this.resultTarget.textContent = "";
        } */
    }

    showToast(message, isError = false) {
        if (typeof Toastify !== "undefined") {
            Toastify({
                text: message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                style: {
                    background: isError
                        ? "linear-gradient(to right, #dc3545, #ff7675)"
                        : "linear-gradient(to right, #28a745, #00b894)",
                },
            }).showToast();
        } else {
            alert(message);
        }
    }
}
