
    const setDefaultPlace = (id) => {
        $.ajax({
            type: "GET",
            url: route("setDefaultPlace", btoa(id)),
            processData: false,
            contentType: false,
            success: function (response) {
                window.location.reload();
            },
            error: function (error) {
                if (error.status == 409) {
                    alert(error.responseJSON.message);
                }
                console.log(error);
                t.removeAttribute("data-kt-indicator");
            },
        });
    }

    const setTimerUp = (start, id_from_act) => {
        $("#done_activity").removeClass('d-none');
        let objectTime      = new Date(start).getTime();
        let currentTime     = new Date().getTime();
        let updatedTime     = new Date(objectTime + 180 * 60 * 1000).getTime();
        

        let split   = start.split(' ')[1];
        split       = split.split(':').join("_");

        function runTime(start, id, split, end) {
            var prevTime,
                elapsedTime = 0;
            
            if (!stopwatchInterval) {
                stopwatchInterval = setInterval(function () {
                    if(Date.now() >= updatedTime){
                        clearInterval(this);
                        clearInterval();
                        setDefaultPlace(id_from_act);
                    }
                    
                    if (!prevTime) {
                        prevTime = new Date(start);
                        prevTime = prevTime.getTime();
                    }
    
                    elapsedTime += Date.now() - prevTime;
                    prevTime = Date.now();
    
                    let tempTime = elapsedTime;
                    let milliseconds = tempTime % 1000;
                    tempTime = Math.floor(tempTime / 1000);
                    let seconds = tempTime % 60;
                    tempTime = Math.floor(tempTime / 60);
                    let minutes = tempTime % 60;
                    tempTime = Math.floor(tempTime / 60);
                    let hours = tempTime % 60;
    
                    hours = hours < 10 ? "0" + hours : hours;
                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;
    
                    let time = hours + " : " + minutes + " : " + seconds;
                    $("#timer").text(time);
                }, 200);
            }
        }

        runTime(start, null, split, null);
    }

    var stopwatchInterval;

    if(typeof start != "string" || start != ""){
        $('#done_activity').attr('onclick', `setDefaultPlace(${id_activity})`);
        setTimerUp(start, id_activity);
    }

    // tiap satu menit request ajax
    setInterval(() => {
        $.ajax({
            type: "GET",
            url: route("getPosition"),
            success: function (response) {
                if(response.data !== null){
                    $('#done_activity').attr('onclick', `setDefaultPlace('${response.data.id}')`);
                    setTimerUp(response.data.start, response.data.id)
                }else{
                    clearInterval(stopwatchInterval)
                    $("#done_activity").addClass('d-none');
                    $("#timer").text("-");
                }
                $("#position").text(response.position != null ? response.position : 'EDP');
                $("#activity").text(response.activity != null ? response.activity : 'Not in Trouble');
                // clearInterval(stopwatchInterval);
            },
        });
    }, 1000);

    // tiap 10 menit reload page
    setInterval(() => {
        window.location.reload();
    }, 600000);

