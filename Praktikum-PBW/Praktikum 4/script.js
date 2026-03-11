document.getElementById('btnCek').addEventListener('click', function() {
    const nim = document.getElementById('nim').value;
    const inputNilai = document.getElementById('nilai').value;
    const hasilDiv = document.getElementById('hasil');
    
    hasilDiv.classList.remove('hidden');

    if (nim === "" || inputNilai === "") {
        hasilDiv.innerHTML = "Harap isi semua data!";
        hasilDiv.className = "result-box error";
        return;
    }

    const nilai = parseFloat(inputNilai);
    let hurufMutu = "";

    if (nilai < 0 || nilai > 100) {
        hasilDiv.innerHTML = "Nilai tidak valid!";
        hasilDiv.className = "result-box error";
    } else {
        if (nilai >= 80) hurufMutu = "A";
        else if (nilai >= 70) hurufMutu = "B";
        else if (nilai >= 60) hurufMutu = "C";
        else if (nilai >= 50) hurufMutu = "D";
        else hurufMutu = "E";

        hasilDiv.innerHTML = `<strong>NIM:</strong> ${nim} <br> <strong>Huruf Mutu:</strong> ${hurufMutu}`;
        hasilDiv.className = "result-box success";
    }
});