function getBusInfo() {
        var busID = document.getElementById("busID").value;
        var httpReq = new XMLHttpRequest();
        httpReq.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("busInfo").innerHTML = this.responseText;
            }
        };
        httpReq.open("GET", "getBusInfo.php?busID=" + busID, true);
        httpReq.send();
    }
    window.onload = function() {
        getBusInfo();
    };