document.getElementById('busID').addEventListener('change', function() {
        var busID = this.value;
        var httpReq = new XMLHttpRequest();
        httpReq.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                var alert = JSON.parse(this.responseText).alert;
                document.getElementById('alertTextBox').value = alert;
            }
        };
        httpReq.open('GET', 'getAlerts.php?busID=' + busID, true);
        httpReq.send();
    });