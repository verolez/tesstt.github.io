window.onload = function () {
    document.getElementById("download-btn")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("generatedproduct");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 0.5,
                filename: 'generatedproduct.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}