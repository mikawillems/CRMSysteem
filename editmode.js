function toggleEditMode() {
    // Zoek de tabel op het moment van klikken
    const table = document.getElementById("dataTable");
    
    // Controleer of de tabel echt gevonden is
    if (!table) {
        console.error("Fout: Tabel met id 'dataTable' niet gevonden op deze pagina!");
        return;
    }

    const cells = table.querySelectorAll("td");
    const btn = document.getElementById("toggleEditBtn");
    const isEditing = table.classList.contains("editing");

    if (!isEditing) {
        table.classList.add("editing");
        cells.forEach(cell => {
            // Sla de originele tekst op
            cell.setAttribute("data-original", cell.innerText);
            cell.contentEditable = "true";
            cell.style.backgroundColor = "#f0becf"; // Lichtgeel achtergrondje zodat je ziet dat het editbaar is
            cell.style.border = "1px solid #00365e";
        });
        btn.innerText = "Opslaan & Afsluiten";
    } else {
        table.classList.remove("editing");
        cells.forEach(cell => {
            cell.contentEditable = "false";
            cell.style.backgroundColor = "transparent";
            cell.style.border = "none";
        });
        btn.innerText = "Tabel bewerken";
        alert("Gegevens zijn aangepast.");
    }
} 