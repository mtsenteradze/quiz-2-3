 window.onload = function () {
        var form = document.getElementById("form");
        

        form.onsubmit = function () {
            var action = form.action;
            var method = form.method;
            var textArea = form.note.value.trim();
            var xmlhttp = new XMLHttpRequest();

            xmlhttp.open(method, action, true);
            xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xmlhttp.send();
            var response;

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 201) {
                    response = JSON.parse(xmlhttp.response);
                    alert(response.status.message);
                    delateTable();
                    drowTable();
                } else if (xmlhttp.readyState == 4 && xmlhttp.status == 400) {
                    response = JSON.parse(xmlhttp.response);
                    alert(response.status.message);
                }
            };

            return false;
        }
    }