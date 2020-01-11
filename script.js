
document.getElementById('mainform').onkeypress = function(e){
    if (!e) e = window.event;
    let keyCode = e.keyCode || e.which;
    if (keyCode == '13'){
        submit()
    }
};

function submit() {
    const query = document.querySelectorAll('input')[0].value;
    const request = new XMLHttpRequest();
    request.open('GET', '/'+query, true);
    request.setRequestHeader('Accept', 'application/json');

    request.onreadystatechange = function() {
        if (request.readyState === 4) {
            const response = JSON.parse(request.responseText);
            window.location;
            window.history.pushState("","Did You Mean "+response[0], "/"+query );
            document.querySelectorAll(".append-here")[0].innerHTML="";
            response.forEach(function (item) {
                const div = document.createElement("div");
                div.className = "suggestion";
                div.append(item);
                document.querySelectorAll(".append-here")[0].append(div);
            });
        }
    };

    request.send();
}