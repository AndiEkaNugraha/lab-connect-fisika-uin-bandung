function showAlert(type, message) {
    const alertId = `alert-${type}`;
    let alertElement = document.getElementById(alertId);
  
    // Jika elemen belum ada, buat baru
    if (!alertElement) {
      const alertContainer = document.querySelector('#alert-container') || createAlertContainer();
      alertElement = document.createElement('div');
      alertElement.id = alertId;
      alertElement.className = `alert alert-${type} alert-dismissible fade`;
      alertElement.style.display = 'none';
      alertContainer.appendChild(alertElement);
    }
  
    alertElement.innerHTML = `
      ${message}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    `;
  
    alertElement.style.display = 'block';
    setTimeout(() => alertElement.classList.add('show'), 10);
  
    // Auto close setelah 3 detik
    setTimeout(() => {
      alertElement.classList.remove('show');
      setTimeout(() => alertElement.style.display = 'none', 300);
    }, 3000);
  }
  
  // Buat container jika belum ada
  function createAlertContainer() {
    const container = document.createElement('div');
    container.id = 'alert-container';
    container.style.cssText = 'position: fixed; top: 15px; right: 15px; z-index: 9999;';
    document.body.appendChild(container);
    return container;
  }
  