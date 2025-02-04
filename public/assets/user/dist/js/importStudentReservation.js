function handleFile(event) {
      const file = event.target.files[0];
      if (!file) return;

      const reader = new FileReader();
      reader.onload = function(e) {
          const data = new Uint8Array(e.target.result);
          processExcelData(data);
      };
      reader.readAsArrayBuffer(file);
  }

  // Fungsi untuk mengambil file Excel dari folder server
  function loadExcelFromServer(filePath) {
      fetch(filePath)
          .then(response => {
              if (!response.ok) {
                  throw new Error('Gagal memuat file.');
              }
              return response.arrayBuffer();
          })
          .then(data => {
              processExcelData(new Uint8Array(data));
          })
          .catch(error => console.error('Error:', error));
  }

  // Fungsi untuk memproses data Excel
  function processExcelData(data) {
      const workbook = XLSX.read(data, { type: 'array' });
      const sheetName = workbook.SheetNames[0]; // Ambil sheet pertama
      const sheet = workbook.Sheets[sheetName];
      const jsonData = XLSX.utils.sheet_to_json(sheet, { header: 1 }); // Konversi ke array 2D
      populateTable(jsonData);
  }

  // Fungsi untuk mengisi tabel dengan data
  function populateTable(data) {
      const tableBody = document.querySelector('#example2 tbody');
      tableBody.innerHTML = ''; // Kosongkan tabel sebelum mengisi data baru

      for (let i = 1; i < data.length; i++) { // Mulai dari baris kedua
          const row = data[i];
          if (row.length > 0) { // Pastikan baris tidak kosong
              const tr = document.createElement('tr');
              tr.innerHTML = `
                  <td>${i}</td>  
                  <td>${row[1] || ''}</td>
              `;
              tableBody.appendChild(tr);
          }
      }
  }