document.getElementById('tallennaMuutoksetNappi').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('.tehtava-valmis-checkbox');
    const tehtavat = Array.from(checkboxes).map(checkbox => {
        return {
            tehtava_id: checkbox.name.split('[')[1].split(']')[0],
            valmis: checkbox.checked ? 1 : 0
        };
    });

    fetch('Utils/tallennaTehtavanTilaIsannoitsija.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(tehtavat)
    }).then(response => response.text())
      .then(data => console.log(data))
      .catch(error => console.error('Error:', error));
});
