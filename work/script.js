function sendRequest(data) {
    fetch('crud.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        console.log(result);
        if (result.message) {
            alert(result.message);
        } else if (result.error) {
            alert(result.error);
        }
    })
    .catch(error => console.error('Erro:', error));
}
