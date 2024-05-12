document.addEventListener('DOMContentLoaded', function() {
  const lahetaTehtavatBtn = document.getElementById('lahetaTehtavat');

  lahetaTehtavatBtn.addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name="valmis"]');
    const tehtavaIds = [];

    checkboxes.forEach((checkbox) => {
      const row = checkbox.closest('tr');
      const taskId = row.querySelector('input[name="delete_id"]').value;
      const valmisValue = checkbox.checked ? 1 : 0;
      const kommenttiField = document.getElementById('kommentti_' + taskId);
      const kommenttiValue = kommenttiField.value; // Hae kommenttikentän arvo

      // Tallenna tehtävän ID, valmis-arvo ja kommentti taulukkoon
      tehtavaIds.push({ tehtava_id: taskId, valmis: valmisValue, kommentti: kommenttiValue });
    });

    // Lähetetään AJAX-pyyntö tallentamaan checkboxien tilat ja kommentit
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'Utils/TallennaTehtavanTila.php');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Jos onnistuu
        console.log('Tehtävien tilat ja kommentit tallennettu.');
        // Käyttäjä pystyy samalla sivulla
        window.location.href = 'tyontekija.php'; // Esimerkiksi pääsivulle
      } else {
        console.error('Virhe tallennettaessa tehtävien tiloja ja kommentteja.');
      }
    };
    
    // Lähetä data JSON-muodossa
    xhr.send(JSON.stringify(tehtavaIds));
  });
});
