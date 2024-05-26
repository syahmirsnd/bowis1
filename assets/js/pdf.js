function generatePDFTempatWisata() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const imgData = '../foto/Bowis.png';
    const imgWidth = 50;
    const imgHeight = 25;
    const xPos = (doc.internal.pageSize.getWidth() - imgWidth) / 2;
    let yPos = 20; 


    doc.addImage(imgData, 'PNG', xPos, yPos, imgWidth, imgHeight);
    yPos += imgHeight + 10; 
 
    doc.setFontSize(18);
    doc.text('Daftar Kontak Tempat Wisata Bogor by Bowis', 20, yPos);
    yPos += 10; 

    const contactItems = document.querySelectorAll('.wisata .contact-item');
    doc.setFontSize(14);

    contactItems.forEach(item => {
        const title = item.querySelector('h2').innerText;
        const paragraphs = item.querySelectorAll('p');

        doc.setFontSize(14);
        doc.text(title, 20, yPos);
        yPos += 10;

        doc.setFontSize(12);
        paragraphs.forEach(p => {
            const text = p.innerText;
            doc.text(text, 20, yPos);
            yPos += 10;
        });

        yPos += 10;
    });

    doc.save('Daftar_Kontak_Tempat_Wisata_Bogor.pdf');
}
function generatePDFPusatBelanja() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const imgData = '../foto/Bowis.png';
    const imgWidth = 50;
    const imgHeight = 25;
    const xPos = (doc.internal.pageSize.getWidth() - imgWidth) / 2;
    let yPos = 20; 


    doc.addImage(imgData, 'PNG', xPos, yPos, imgWidth, imgHeight);
    yPos += imgHeight + 10; 
 
    doc.setFontSize(18);
    doc.text('Daftar Kontak Pusat Perbelanjaan Bogor by Bowis', 20, yPos);
    yPos += 10; 

    const contactItems = document.querySelectorAll('.belanja .contact-item');
    doc.setFontSize(14);

    contactItems.forEach(item => {
        const title = item.querySelector('h2').innerText;
        const paragraphs = item.querySelectorAll('p');

        doc.setFontSize(14);
        doc.text(title, 20, yPos);
        yPos += 10;

        doc.setFontSize(12);
        paragraphs.forEach(p => {
            const text = p.innerText;
            doc.text(text, 20, yPos);
            yPos += 10;
        });

        yPos += 10;
    });

    doc.save('Daftar_Kontak_Pusat_Belanja_Bogor.pdf');
}
function generatePDFTamanHiburan() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const imgData = '../foto/Bowis.png';
    const imgWidth = 50;
    const imgHeight = 25;
    const xPos = (doc.internal.pageSize.getWidth() - imgWidth) / 2;
    let yPos = 20; 


    doc.addImage(imgData, 'PNG', xPos, yPos, imgWidth, imgHeight);
    yPos += imgHeight + 10; 
 
    doc.setFontSize(18);
    doc.text('Daftar Kontak Taman Hiburan Bogor by Bowis', 20, yPos);
    yPos += 10; 

    const contactItems = document.querySelectorAll('.taman .contact-item');
    doc.setFontSize(14);

    contactItems.forEach(item => {
        const title = item.querySelector('h2').innerText;
        const paragraphs = item.querySelectorAll('p');

        doc.setFontSize(14);
        doc.text(title, 20, yPos);
        yPos += 10;

        doc.setFontSize(12);
        paragraphs.forEach(p => {
            const text = p.innerText;
            doc.text(text, 20, yPos);
            yPos += 10;
        });

        yPos += 10;
    });

    doc.save('Daftar_Kontak_Taman_Hiburan_Bogor.pdf');
}
function generatePDFTempatKuliner() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const imgData = '../foto/Bowis.png';
    const imgWidth = 50;
    const imgHeight = 25;
    const xPos = (doc.internal.pageSize.getWidth() - imgWidth) / 2;
    let yPos = 20; 


    doc.addImage(imgData, 'PNG', xPos, yPos, imgWidth, imgHeight);
    yPos += imgHeight + 10; 
 
    doc.setFontSize(18);
    doc.text('Daftar Kontak Tempat Kuliner Bogor by Bowis', 20, yPos);
    yPos += 10; 

    const contactItems = document.querySelectorAll('.kuliner .contact-item');
    doc.setFontSize(14);

    contactItems.forEach(item => {
        const title = item.querySelector('h2').innerText;
        const paragraphs = item.querySelectorAll('p');

        doc.setFontSize(14);
        doc.text(title, 20, yPos);
        yPos += 10;

        doc.setFontSize(12);
        paragraphs.forEach(p => {
            const text = p.innerText;
            doc.text(text, 20, yPos);
            yPos += 10;
        });

        yPos += 10;
    });

    doc.save('Daftar_Kontak_Tempat_Kuliner_Bogor.pdf');
}
function generatePDFMuseum() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const imgData = '../foto/Bowis.png';
    const imgWidth = 50;
    const imgHeight = 25;
    const xPos = (doc.internal.pageSize.getWidth() - imgWidth) / 2;
    let yPos = 20; 


    doc.addImage(imgData, 'PNG', xPos, yPos, imgWidth, imgHeight);
    yPos += imgHeight + 10; 
 
    doc.setFontSize(18);
    doc.text('Daftar Kontak Museum Bogor by Bowis', 20, yPos);
    yPos += 10; 

    const contactItems = document.querySelectorAll('.museum .contact-item');
    doc.setFontSize(14);

    contactItems.forEach(item => {
        const title = item.querySelector('h2').innerText;
        const paragraphs = item.querySelectorAll('p');

        doc.setFontSize(14);
        doc.text(title, 20, yPos);
        yPos += 10;

        doc.setFontSize(12);
        paragraphs.forEach(p => {
            const text = p.innerText;
            doc.text(text, 20, yPos);
            yPos += 10;
        });

        yPos += 10;
    });

    doc.save('Daftar_Kontak_Museum_Bogor.pdf');
}
function generatePDFWisataReligi() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();
    const imgData = '../foto/Bowis.png';
    const imgWidth = 50;
    const imgHeight = 25;
    const xPos = (doc.internal.pageSize.getWidth() - imgWidth) / 2;
    let yPos = 20; 


    doc.addImage(imgData, 'PNG', xPos, yPos, imgWidth, imgHeight);
    yPos += imgHeight + 10; 
 
    doc.setFontSize(18);
    doc.text('Daftar Kontak Wisata Religi Bogor by Bowis', 20, yPos);
    yPos += 10; 

    const contactItems = document.querySelectorAll('.religi .contact-item');
    doc.setFontSize(14);

    contactItems.forEach(item => {
        const title = item.querySelector('h2').innerText;
        const paragraphs = item.querySelectorAll('p');

        doc.setFontSize(14);
        doc.text(title, 20, yPos);
        yPos += 10;

        doc.setFontSize(12);
        paragraphs.forEach(p => {
            const text = p.innerText;
            doc.text(text, 20, yPos);
            yPos += 10;
        });

        yPos += 10;
    });

    doc.save('Daftar_Kontak_Wisata_Religi_Bogor.pdf');
}

