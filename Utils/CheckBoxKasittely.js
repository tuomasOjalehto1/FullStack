//Pelkkä PHP ei lähtenyt millään toimimaan joten käytetään JS ajax juttuja lähettämään checkboksin tieto

document.addEventListener('DOMContentLoaded', function() {
  const lahetaTehtavatBtn = document.getElementById('lahetaTehtavat');

  lahetaTehtavatBtn.addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name="valmis"]');
    const tehtavaIds = [];

    checkboxes.forEach((checkbox) => {
      const row = checkbox.closest('tr');
      const taskId = row.querySelector('input[name="delete_id"]').value;
      const valmisValue = checkbox.checked ? 1 : 0;

      // Tallenna tehtävän ID ja valmis-arvo taulukkoon
      tehtavaIds.push({ tehtava_id: taskId, valmis: valmisValue });
    });

    // Lähetetään AJAX-pyyntö tallentamaan checkboxien tilat
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'Utils/TallennaTehtavanTila.php');
    xhr.setRequestHeader('Content-Type', 'application/json');
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Jos onnistuu
        console.log('Tehtävien tilat tallennettu.');
        // Käyttäjä pystyy samalla sivulla
        window.location.href = 'tyontekija.php'; // Esimerkiksi pääsivulle
      } else {
        console.error('Virhe tallennettaessa tehtävien tiloja.');
      }
    };
    
    // Lähetä data JSON-muodossa
    xhr.send(JSON.stringify(tehtavaIds));
  });
});
